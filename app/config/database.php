<?php
require_once __DIR__ . '/env.php';

function get_pdo(): PDO {
    $host = env_get('DB_HOST', 'localhost');
    $db   = env_get('DB_NAME', 'teste');
    $user = env_get('DB_USER', 'root');
    $pass = env_get('DB_PASS', '');
    $charset = env_get('DB_CHARSET', 'utf8mb4');

    $dsn = "mysql:host={$host};dbname={$db};charset={$charset}";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    return new PDO($dsn, $user, $pass, $options);
}


// function get_pdo(): PDO {
//     $host = env_get('DB_HOST', 'mysql.hostinger.com');
//     $db   = env_get('DB_NAME', 'u455152201_codesphere');
//     $user = env_get('DB_USER', 'u455152201_codesphere');
//     $pass = env_get('DB_PASS', 'LlZWYTHF>0');
//     $charset = env_get('DB_CHARSET', 'utf8mb4');

//     $dsn = "mysql:host={$host};dbname={$db};charset={$charset}";
//     $options = [
//         PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//         PDO::ATTR_EMULATE_PREPARES   => false,
//     ];
//     return new PDO($dsn, $user, $pass, $options);
// }
