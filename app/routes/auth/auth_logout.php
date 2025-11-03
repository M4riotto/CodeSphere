<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/bootstrap.php';
require_once __DIR__ . '../../../services/AuthService.php';

$svc = new AuthService();
$hash = $svc->getCurrentSessionHash(); // ou receba do header/body
$ok = $hash ? $svc->logout($hash) : false;

echo json_encode(['success' => (bool)$ok]);
