<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/bootstrap.php';
require_once __DIR__ . '/../../app/services/AuthService.php';

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$key = $input['key'] ?? ($_GET['key'] ?? '');
$pass = (string)($input['password'] ?? '');
$rep  = (string)($input['password_confirm'] ?? '');

$svc = new AuthService();
$res = $svc->resetPassword($key, $pass, $rep);

echo json_encode(['success' => !$res['error'], 'message' => $res['message'] ?? null]);
