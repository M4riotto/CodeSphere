<?php
header('Content-Type: application/json; charset=utf-8');

try {
    require_once __DIR__ . '/../usecases/GetCourse.php';

    $id   = isset($_GET['id'])   ? (int)$_GET['id'] : null;
    $slug = isset($_GET['slug']) ? trim($_GET['slug']) : null;

    if (!$id && !$slug) {
        http_response_code(400);
        echo json_encode(['success'=>false,'message'=>'Informe id ou slug.']);
        exit;
    }

    $uc = new GetCourse();
    $data = $id ? $uc->byId($id) : $uc->bySlug($slug);

    // helpers de formatação
    $priceCents = (int)($data['price_cents'] ?? 0);
    $priceBRL = number_format($priceCents / 100, 2, ',', '.');

    $durSec = (int)($data['total_duration_sec'] ?? 0);
    $hours = floor($durSec / 3600);
    $mins  = floor(($durSec % 3600) / 60);
    $durLabel = ($hours ? "{$hours}h" : "") . ($mins ? ($hours ? " " : "") . "{$mins}min" : ($hours ? "" : "0min"));

    echo json_encode([
        'success' => true,
        'data' => [
            'id'              => (int)$data['id'],
            'title'           => $data['title'],
            'slug'            => $data['slug'],
            'summary'         => $data['summary'],
            'description'     => $data['description'],
            'thumbnail_url'   => $data['thumbnail_url'],
            'category'        => $data['category_name'],
            'level'           => $data['level'],
            'language'        => $data['language'],
            'is_published'    => (int)$data['is_published'],
            'price_cents'     => $priceCents,
            'price_brl'       => "R$ {$priceBRL}",
            'total_duration_sec'  => $durSec,
            'total_duration_text' => $durLabel,
            'modules'         => $data['modules'],
            'instructors'         => $data['instructors'],
        ]
    ], JSON_UNESCAPED_UNICODE);

} catch (InvalidArgumentException $e) {
    http_response_code(404);
    echo json_encode(['success'=>false,'message'=>$e->getMessage()]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>'Erro interno','error'=>$e->getMessage()]);
}
