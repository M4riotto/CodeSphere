<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/bootstrap.php';
require_once __DIR__ . '../../../services/AuthService.php';

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$email = trim($input['email'] ?? '');
$pass  = (string)($input['password'] ?? '');
$remember = !empty($input['remember']);

$svc = new AuthService();
$res = $svc->login($email, $pass, $remember);

echo json_encode([
    'success' => !$res['error'],
    'message' => $res['message'] ?? null,
    'session_hash' => $res['hash'] ?? null,
    'expire' => $res['expire'] ?? null
]);
