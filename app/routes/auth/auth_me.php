<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/bootstrap.php';
require_once __DIR__ . '/../../app/middleware/auth_guard.php';
require_once __DIR__ . '/../../app/services/AuthService.php';

require_auth_or_403();

$svc = new AuthService();
$user = $svc->getCurrentUser();

echo json_encode(['success' => true, 'data' => $user]);
