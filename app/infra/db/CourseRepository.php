<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../repositories/ICourseRepository.php';

class CourseRepository implements ICourseRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo = null)
    {
        $this->pdo = $pdo ?: get_pdo();
    }

    public function slugExists(string $slug): bool
    {
        $stmt = $this->pdo->prepare("SELECT id FROM courses WHERE slug = ? LIMIT 1");
        $stmt->execute([$slug]);
        return (bool)$stmt->fetch();
    }

    public function create(Course $course, int $userId = 1): int
    {
            // 1️⃣ Inserir o curso
            $sql = "INSERT INTO courses
            (title, slug, summary, description, thumbnail_url, category_id, level, language, is_published, price_cents, created_at)
            VALUES
            (:title, :slug, :summary, :description, :thumbnail_url, :category_id, :level, :language, :is_published, :price_cents, NOW())";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':title',         $course->title);
            $stmt->bindValue(':slug',          $course->slug);
            $stmt->bindValue(':summary',       $course->summary);
            $stmt->bindValue(':description',   $course->description);
            $stmt->bindValue(':thumbnail_url', $course->thumbnail_url);
            $stmt->bindValue(':category_id',   $course->category_id, $course->category_id ? PDO::PARAM_INT : PDO::PARAM_NULL);
            $stmt->bindValue(':level',         $course->level);
            $stmt->bindValue(':language',      $course->language);
            $stmt->bindValue(':is_published',  $course->is_published, PDO::PARAM_INT);
            $stmt->bindValue(':price_cents',   $course->price_cents,  PDO::PARAM_INT);
            $stmt->execute();

            $courseId = (int)$this->pdo->lastInsertId();

            // 2️⃣ Inserir o instrutor (user_id padrão = 1)
            $sql2 = "INSERT INTO course_instructors (course_id, user_id)
                 VALUES (:course_id, :user_id)";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->bindValue(':course_id', $courseId, PDO::PARAM_INT);
            $stmt2->bindValue(':user_id',   $userId,   PDO::PARAM_INT);
            $stmt2->execute();

            return $courseId;
        
    }


    public function findByIdWithStructure(int $id): ?array
    {
        // 1) Curso + categoria
        $csql = "SELECT c.*, cat.name AS category_name
                 FROM courses c
                 LEFT JOIN course_categories cat ON cat.id = c.category_id
                 WHERE c.id = ? LIMIT 1";
        $cst = $this->pdo->prepare($csql);
        $cst->execute([$id]);
        $course = $cst->fetch(PDO::FETCH_ASSOC);
        if (!$course) return null;

        // 2) Módulos
        $msql = "SELECT id, title, position
                 FROM course_modules
                 WHERE course_id = ?
                 ORDER BY position ASC, id ASC";
        $mst = $this->pdo->prepare($msql);
        $mst->execute([$id]);
        $modules = $mst->fetchAll(PDO::FETCH_ASSOC);

        // 3) Aulas por módulo (em 1 query se possível)
        $moduleIds = array_column($modules, 'id');
        $lessonsByModule = [];
        $totalDuration = 0;

        if ($moduleIds) {
            $in = implode(',', array_fill(0, count($moduleIds), '?'));
            $lsql = "SELECT l.id, l.module_id, l.title, l.slug, l.duration_sec, l.position, l.is_preview, l.video_url
                     FROM lessons l
                     WHERE l.module_id IN ($in)
                     ORDER BY l.module_id ASC, l.position ASC, l.id ASC";
            $params = $moduleIds;
            $lst = $this->pdo->prepare($lsql);
            $lst->execute($params);
            while ($row = $lst->fetch(PDO::FETCH_ASSOC)) {
                $lessonsByModule[$row['module_id']][] = $row;
                $totalDuration += (int)$row['duration_sec'];
            }
        }

        // Monta estrutura final
        foreach ($modules as &$m) {
            $m['lessons'] = $lessonsByModule[$m['id']] ?? [];
        }

        $course['modules'] = $modules;
        $course['total_duration_sec'] = $totalDuration;

        return $course;
    }

    public function findBySlugWithStructure(string $slug): ?array
    {
        $st = $this->pdo->prepare("SELECT id FROM courses WHERE slug = ? LIMIT 1");
        $st->execute([$slug]);
        $row = $st->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;
        return $this->findByIdWithStructure((int)$row['id']);
    }

    public function findAllBasic(?string $q = null, ?int $categoryId = null, int $limit = 24, int $offset = 0): array
    {
        $sql = "SELECT c.id, c.title, c.slug, c.summary, c.thumbnail_url,
                   c.price_cents, c.created_at, c.is_published,
                   cat.name AS category_name
            FROM courses c
            LEFT JOIN course_categories cat ON cat.id = c.category_id
            WHERE 1=1";
        $params = [];

        if ($q) {
            $sql .= " AND (c.title LIKE ? OR c.summary LIKE ?)";
            $like = "%{$q}%";
            $params[] = $like;
            $params[] = $like;
        }
        if ($categoryId) {
            $sql .= " AND c.category_id = ?";
            $params[] = $categoryId;
        }

        $sql .= " ORDER BY c.created_at DESC, c.id DESC LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;

        $st = $this->pdo->prepare($sql);
        // bind manual para LIMIT/OFFSET inteiros
        $i = 1;
        foreach ($params as $p) {
            $type = is_int($p) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $st->bindValue($i++, $p, $type);
        }
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}
