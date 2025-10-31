<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/bootstrap.php';
require_once __DIR__ . '/../../app/services/AuthService.php';

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$email = trim($input['email'] ?? '');

$svc = new AuthService();
$res = $svc->requestReset($email);

echo json_encode(['success' => !$res['error'], 'message' => $res['message'] ?? null]);
