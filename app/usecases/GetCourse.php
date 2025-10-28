<?php
require_once __DIR__ . '/../infra/db/CourseRepository.php';

class GetCourse {
    private CourseRepository $repo;
    public function __construct(CourseRepository $repo = null) { $this->repo = $repo ?: new CourseRepository(); }

    public function byId(int $id): array {
        $data = $this->repo->findByIdWithStructure($id);
        if (!$data) throw new InvalidArgumentException('Curso não encontrado.');
        return $data;
    }

    public function bySlug(string $slug): array {
        $data = $this->repo->findBySlugWithStructure($slug);
        if (!$data) throw new InvalidArgumentException('Curso não encontrado.');
        return $data;
    }
}
