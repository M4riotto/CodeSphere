<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../Entities/Module.php';
require_once __DIR__ . '/../../repositories/IModuleRepository.php';

class ModuleRepository implements IModuleRepository {
  private PDO $pdo;
  public function __construct(PDO $pdo = null) { $this->pdo = $pdo ?: get_pdo(); }

  public function create(int $courseId, ModuleEntity $m): int {
    $sql = "INSERT INTO course_modules (course_id, title, position, created_at) VALUES (:cid, :title, :pos, NOW())";
    $st = $this->pdo->prepare($sql);
    $st->bindValue(':cid', $courseId, PDO::PARAM_INT);
    $st->bindValue(':title', $m->title);
    $st->bindValue(':pos', $m->position, PDO::PARAM_INT);
    $st->execute();
    return (int)$this->pdo->lastInsertId();
  }
}
