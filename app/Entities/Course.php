<?php
class Course {
    public ?int $id;
    public string $title;
    public string $slug;
    public ?string $summary;
    public ?string $description;
    public ?string $thumbnail_url;
    public ?int $category_id;              // pode ser null
    public string $level;                   // beginner|intermediate|advanced
    public string $language;                // pt-BR
    public int $is_published;               // 0/1
    public int $price_cents;                // 0 = gratuito
    public ?string $created_at;
    public ?string $updated_at;

    public function __construct(array $data) {
        $this->id            = $data['id']            ?? null;
        $this->title         = trim($data['title']    ?? '');
        $this->slug          = trim($data['slug']     ?? '');
        $this->summary       = $data['summary']       ?? null;
        $this->description   = $data['description']   ?? null;
        $this->thumbnail_url = $data['thumbnail_url'] ?? null;
        $this->category_id   = isset($data['category_id']) && $data['category_id'] !== '' ? (int)$data['category_id'] : null;
        $this->level         = $data['level']         ?? 'beginner';
        $this->language      = $data['language']      ?? 'pt-BR';
        $this->is_published  = (int)($data['is_published'] ?? 0);
        $this->price_cents   = (int)($data['price_cents']  ?? 0);
        $this->created_at    = $data['created_at']    ?? null;
        $this->updated_at    = $data['updated_at']    ?? null;
    }
}
