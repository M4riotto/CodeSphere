<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../Entities/Lesson.php';
require_once __DIR__ . '/../../repositories/ILessonRepository.php';

class LessonRepository implements ILessonRepository {
  private PDO $pdo;
  public function __construct(PDO $pdo = null) { $this->pdo = $pdo ?: get_pdo(); }

  public function slugExists(int $moduleId, string $slug): bool {
    $st = $this->pdo->prepare("SELECT id FROM lessons WHERE module_id = ? AND slug = ? LIMIT 1");
    $st->execute([$moduleId, $slug]);
    return (bool)$st->fetch();
  }

  public function create(int $moduleId, LessonEntity $l): int {
    $sql = "INSERT INTO lessons
      (module_id, title, slug, content_html, video_url, duration_sec, position, is_preview, created_at)
      VALUES
      (:mid, :title, :slug, :html, :video, :dur, :pos, :prev, NOW())";
    $st = $this->pdo->prepare($sql);
    $st->bindValue(':mid', $moduleId, PDO::PARAM_INT);
    $st->bindValue(':title', $l->title);
    $st->bindValue(':slug', $l->slug);
    $st->bindValue(':html', $l->content_html);
    $st->bindValue(':video', $l->video_url);
    $st->bindValue(':dur', $l->duration_sec, PDO::PARAM_INT);
    $st->bindValue(':pos', $l->position, PDO::PARAM_INT);
    $st->bindValue(':prev', $l->is_preview, PDO::PARAM_INT);
    $st->execute();
    return (int)$this->pdo->lastInsertId();
  }
}
