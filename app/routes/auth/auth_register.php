<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/bootstrap.php';
require_once __DIR__ . '../../../services/AuthService.php';

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$email = trim($input['email'] ?? '');
$pass  = (string)($input['password'] ?? '');
$re    = (string)($input['password_confirm'] ?? '');

$svc = new AuthService();
$res = $svc->register($email, $pass, $re, /* params */ []);

echo json_encode([
    'success' => !$res['error'],
    'message' => $res['message'] ?? null
]);
