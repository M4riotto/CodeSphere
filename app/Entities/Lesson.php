<?php
class LessonEntity {
  public ?int $id;
  public string $title;
  public string $slug;
  public ?string $content_html;
  public ?string $video_url;
  public int $duration_sec;
  public int $position;
  public int $is_preview;

  public function __construct(array $d) {
    $this->id = $d['id'] ?? null;
    $this->title = trim($d['title'] ?? '');
    $this->slug = trim($d['slug'] ?? '');
    $this->content_html = $d['content_html'] ?? null;
    $this->video_url    = $d['video_url'] ?? null;
    $this->duration_sec = (int)($d['duration_sec'] ?? 0);
    $this->position     = (int)($d['position'] ?? 1);
    $this->is_preview   = (int)($d['is_preview'] ?? 0);
  }
}
