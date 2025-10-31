<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/bootstrap.php';
require_once __DIR__ . '/../../app/services/AuthService.php';

$key = $_GET['key'] ?? '';
$svc = new AuthService();
$res = $svc->activate($key);

echo json_encode([
    'success' => !$res['error'],
    'message' => $res['message'] ?? null
]);
