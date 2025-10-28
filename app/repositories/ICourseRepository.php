<?php
require_once __DIR__ . '/../Entities/Course.php';

interface ICourseRepository
{
    public function create(Course $course): int;
    public function slugExists(string $slug): bool;

    /** Retorna o curso + categoria + módulos + aulas (ordenados) por ID. */
    public function findByIdWithStructure(int $id): ?array;

    /** (Opcional) Pelo slug, útil para rotas amigáveis. */
    public function findBySlugWithStructure(string $slug): ?array;

    public function findAllBasic(?string $q = null, ?int $categoryId = null, int $limit = 24, int $offset = 0): array;
}
