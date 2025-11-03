<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/bootstrap.php';
require_once __DIR__ . '../../../services/AuthService.php';

use ZxcvbnPhp\Zxcvbn;

$zxcvbn = new Zxcvbn();
$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$pass  = (string)($input['password_confirm'] ?? '');
var_dump($pass);
$strength = $zxcvbn->passwordStrength($pass);

print_r($strength['feedback']);

return $strength;
exit;

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
