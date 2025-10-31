<?php
require_once __DIR__ . '/../services/AuthService.php';

function require_auth_or_403()
{
    $auth = new AuthService();
    print_r($auth->getCurrentUser());
    if (!$auth->isLogged()) {
        http_response_code(403);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => 'Forbidden']);
        exit;
    }
}
