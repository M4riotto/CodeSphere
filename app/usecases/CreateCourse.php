<?php
require_once __DIR__ . '/../Entities/Course.php';
require_once __DIR__ . '/../infra/db/CourseRepository.php';

class CreateCourse {
    private CourseRepository $repo;

    public function __construct(CourseRepository $repo = null) {
        $this->repo = $repo ?: new CourseRepository();
    }

    private function slugify(string $text): string {
        $text = mb_strtolower($text, 'UTF-8');
        $text = preg_replace('/[áàâãä]/u', 'a', $text);
        $text = preg_replace('/[éèêë]/u', 'e', $text);
        $text = preg_replace('/[íìîï]/u', 'i', $text);
        $text = preg_replace('/[óòôõö]/u', 'o', $text);
        $text = preg_replace('/[úùûü]/u', 'u', $text);
        $text = preg_replace('/ç/u', 'c', $text);
        $text = preg_replace('/[^a-z0-9]+/u', '-', $text);
        $text = trim($text, '-');
        return $text ?: 'curso';
    }

    public function execute(array $input): array {
        // validações mínimas
        if (empty($input['title'])) {
            throw new InvalidArgumentException('title é obrigatório.');
        }

        // slug: do input ou gerado pelo título
        $slug = $input['slug'] ?? $this->slugify($input['title']);
        $baseSlug = $slug;
        $i = 2;
        // garante unicidade
        while ($this->repo->slugExists($slug)) {
            $slug = "{$baseSlug}-{$i}";
            $i++;
        }

        // normaliza valores
        $payload = [
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
        ];

        $course = new Course($payload);
        $newId = $this->repo->create($course);

        return [
            'id'    => $newId,
            'slug'  => $course->slug,
            'title' => $course->title
        ];
    }
}
