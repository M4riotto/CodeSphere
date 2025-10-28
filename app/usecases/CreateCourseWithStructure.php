<?php
require_once __DIR__ . '/../Entities/Course.php';
require_once __DIR__ . '/../Entities/Module.php';
require_once __DIR__ . '/../Entities/Lesson.php';

require_once __DIR__ . '/../infra/db/CourseRepository.php';
require_once __DIR__ . '/../infra/db/ModuleRepository.php';
require_once __DIR__ . '/../infra/db/LessonRepository.php';
require_once __DIR__ . '/../config/database.php';

class CreateCourseWithStructure {
  private PDO $pdo;
  private CourseRepository $courseRepo;
  private ModuleRepository $moduleRepo;
  private LessonRepository $lessonRepo;

  public function __construct() {
    $this->pdo = get_pdo();
    $this->courseRepo = new CourseRepository($this->pdo);
    $this->moduleRepo = new ModuleRepository($this->pdo);
    $this->lessonRepo = new LessonRepository($this->pdo);
  }

  private function slugify(string $text): string {
    $text = mb_strtolower($text, 'UTF-8');
    $map = [
      '/[áàâãä]/u' => 'a','/[éèêë]/u'=>'e','/[íìîï]/u'=>'i',
      '/[óòôõö]/u'=>'o','/[úùûü]/u'=>'u','/ç/u'=>'c'
    ];
    foreach ($map as $regex => $rep) $text = preg_replace($regex, $rep, $text);
    $text = preg_replace('/[^a-z0-9]+/u', '-', $text);
    $text = trim($text, '-');
    return $text ?: 'item';
  }

  public function execute(array $input): array {
    if (empty($input['title'])) {
      throw new InvalidArgumentException('title é obrigatório.');
    }
    if (!isset($input['modules']) || !is_array($input['modules']) || count($input['modules']) === 0) {
      throw new InvalidArgumentException('modules é obrigatório e deve conter ao menos 1 módulo.');
    }

    // Monta Course (reutilizando a lógica do CreateCourse)
    $slug = $input['slug'] ?? $this->slugify($input['title']);
    $baseSlug = $slug; $i=2;
    while ($this->courseRepo->slugExists($slug)) { $slug = "{$baseSlug}-{$i}"; $i++; }

    $course = new Course([
      'title'         => $input['title'],
      'slug'          => $slug,
      'summary'       => $input['summary']       ?? null,
      'description'   => $input['description']   ?? null,
      'thumbnail_url' => $input['thumbnail_url'] ?? null,
      'category_id'   => $input['category_id']   ?? null,
      'level'         => $input['level']         ?? 'beginner',
      'language'      => $input['language']      ?? 'pt-BR',
      'is_published'  => isset($input['is_published']) ? (int)$input['is_published'] : 0,
      'price_cents'   => isset($input['price_cents']) ? (int)$input['price_cents'] : 0,
    ]);

    $this->pdo->beginTransaction();
    try {
      // 1) Cria o curso
      $courseId = $this->courseRepo->create($course);

      $created = [
        'course'  => ['id' => $courseId, 'slug' => $course->slug, 'title' => $course->title],
        'modules' => []
      ];

      // 2) Cria módulos e aulas
      $modulesInput = $input['modules'];

      // se não vier position, usa índice do array (1-based)
      foreach ($modulesInput as $mIndex => $mData) {
        if (empty($mData['title'])) throw new InvalidArgumentException("Módulo #".($mIndex+1).": title é obrigatório.");
        $module = new ModuleEntity([
          'title'    => $mData['title'],
          'position' => isset($mData['position']) ? (int)$mData['position'] : ($mIndex + 1),
        ]);
        $moduleId = $this->moduleRepo->create($courseId, $module);

        $createdModule = ['id'=>$moduleId, 'title'=>$module->title, 'position'=>$module->position, 'lessons'=>[]];

        $lessonsInput = $mData['lessons'] ?? [];
        if (!is_array($lessonsInput) || count($lessonsInput) === 0) {
          throw new InvalidArgumentException("Módulo '{$module->title}' precisa conter ao menos 1 aula.");
        }

        foreach ($lessonsInput as $lIndex => $lData) {
          if (empty($lData['title'])) throw new InvalidArgumentException("Aula #".($lIndex+1)." do módulo '{$module->title}': title é obrigatório.");
          $lSlug = $lData['slug'] ?? $this->slugify($lData['title']);
          $base = $lSlug; $x=2;
          while ($this->lessonRepo->slugExists($moduleId, $lSlug)) { $lSlug = "{$base}-{$x}"; $x++; }

          $lesson = new LessonEntity([
            'title'        => $lData['title'],
            'slug'         => $lSlug,
            'content_html' => $lData['content_html'] ?? null,
            'video_url'    => $lData['video_url'] ?? null,
            'duration_sec' => isset($lData['duration_sec']) ? (int)$lData['duration_sec'] : 0,
            'position'     => isset($lData['position']) ? (int)$lData['position'] : ($lIndex + 1),
            'is_preview'   => isset($lData['is_preview']) ? (int)$lData['is_preview'] : 0,
          ]);

          $lessonId = $this->lessonRepo->create($moduleId, $lesson);
          $createdModule['lessons'][] = [
            'id'=>$lessonId,'title'=>$lesson->title,'slug'=>$lesson->slug,
            'position'=>$lesson->position,'is_preview'=>$lesson->is_preview
          ];
        }

        $created['modules'][] = $createdModule;
      }

      $this->pdo->commit();
      return $created;

    } catch (Throwable $e) {
      $this->pdo->rollBack();
      throw $e;
    }
  }
}
