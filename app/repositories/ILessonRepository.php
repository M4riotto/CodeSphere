<?php
interface ILessonRepository {
  public function slugExists(int $moduleId, string $slug): bool;
  public function create(int $moduleId, LessonEntity $lesson): int;
}
