<?php
header('Content-Type: application/json; charset=utf-8');

try {
    require_once __DIR__ . '/../usecases/GetCourse.php';
    require_once __DIR__ . '/../services/AuthService.php';

    $auth = new AuthService();
    $uc = new GetCourse();

    $id = $auth->getCurrentUser();
    $courses = $uc->byIdAdmin($id['id']); // retorna ARRAY

    if (!$courses) {
        echo json_encode(['success' => true, 'data' => []]);
        exit;
    }

    $formatted = [];

    foreach ($courses as $c) {

        // formatação de preço
        $priceCents = (int)($c['price_cents'] ?? 0);
        $priceBRL = number_format($priceCents / 100, 2, ',', '.');

        // formatação de duração
        $durSec = (int)($c['total_duration_sec'] ?? 0);
        $hours = floor($durSec / 3600);
        $mins  = floor(($durSec % 3600) / 60);
        $durLabel = ($hours ? "{$hours}h " : "") . ($mins ? "{$mins}min" : "0min");

        $formatted[] = [
            'id'              => (int)$c['id'],
            'title'           => $c['title'],
            'slug'            => $c['slug'],
            'summary'         => $c['summary'],
            'description'     => $c['description'],
            'thumbnail_url'   => $c['thumbnail_url'],
            'category'        => $c['category_name'],
            'level'           => $c['level'],
            'language'        => $c['language'],
            'is_published'    => (int)$c['is_published'],
            'price_cents'     => $priceCents,
            'price_brl'       => "R$ {$priceBRL}",
            'total_duration_sec'  => $durSec,
            'total_duration_text' => $durLabel,
            'modules'             => $c['modules'],
            'instructors'         => $c['instructors'],
        ];
    }

    echo json_encode([
        'success' => true,
        'data' => $formatted
    ], JSON_UNESCAPED_UNICODE);
} catch (InvalidArgumentException $e) {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Erro interno', 'error' => $e->getMessage()]);
}
