<?php
function env_get(string $key, $default = null) {
    static $env = null;
    if ($env === null) {
        $path = dirname(__DIR__) . '/.env';
        $env = [];
        if (file_exists($path)) {
            $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) continue;
                [$k, $v] = array_map('trim', explode('=', $line, 2));
                $env[$k] = $v;
            }
        }
    }
    return $env[$key] ?? $default;
}
