<?php
header('Content-Type: application/json; charset=utf-8');

try {
    require_once __DIR__ . '/../infra/db/CourseRepository.php';

    $q          = isset($_GET['q']) ? trim($_GET['q']) : null;
    $categoryId = isset($_GET['category_id']) && $_GET['category_id'] !== '' ? (int)$_GET['category_id'] : null;
    $limit      = isset($_GET['limit']) ? max(1, (int)$_GET['limit']) : 24;
    $offset     = isset($_GET['offset']) ? max(0, (int)$_GET['offset']) : 0;

    $repo = new CourseRepository();
    $rows = $repo->findAllBasic($q, $categoryId, $limit, $offset);

    $list = array_map(function($r) {
        $priceBRL = number_format(((int)$r['price_cents'])/100, 2, ',', '.');
        // sub-título com fallback do summary
        $subtitle = $r['summary'] ? mb_substr(strip_tags($r['summary']), 0, 140, 'UTF-8') : 'Curso completo para acelerar sua evolução.';
        return [
            'id'            => (int)$r['id'],
            'title'         => $r['title'],
            'slug'          => $r['slug'],
            'category'      => $r['category_name'] ?: 'Geral',
            'thumbnail_url' => $r['thumbnail_url'],
            'price_brl'     => "R$ {$priceBRL}",
            'subtitle'      => $subtitle,
            'published'      => $r['is_published']
        ];
    }, $rows);

    echo json_encode(['success' => true, 'data' => $list], JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>'Erro interno','error'=>$e->getMessage()]);
}
