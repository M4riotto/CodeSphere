<?php
class ModuleEntity {
  public ?int $id;
  public string $title;
  public int $position;

  public function __construct(array $d) {
    $this->id = $d['id'] ?? null;
    $this->title = trim($d['title'] ?? '');
    $this->position = (int)($d['position'] ?? 1);
  }
}
