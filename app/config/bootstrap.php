<?php
// exibindo erros só em dev:
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Autoload do Composer (necessário pro PHPAuth):
require_once __DIR__ . '/../../vendor/autoload.php';

// DB (PDO) — usa teu arquivo de conexão:
require_once __DIR__ . '/database.php'; // define get_pdo()

// >>> ADICIONE ISSO: cria $pdo global para quem precisar <<<
if (!isset($pdo) || !($pdo instanceof PDO)) {
    $pdo = get_pdo();
}

// (opcional) caminho base:
if (!defined('APP_PATH')) {
    define('APP_PATH', dirname(__DIR__)); // .../app
}
