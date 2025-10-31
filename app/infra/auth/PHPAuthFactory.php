<?php
require_once __DIR__ . '../../../config/bootstrap.php'; // puxa autoload e $pdo

use PHPAuth\Config as PHPAuthConfig;
use PHPAuth\Auth as PHPAuthAuth;

class PHPAuthFactory
{
    private static ?PHPAuthConfig $config = null;
    private static ?PHPAuthAuth $auth = null;

    public static function config(): PHPAuthConfig
    {
        if (!self::$config) {
            // Carrega do SQL padrão (tabela phpauth_config) e define idioma pt_BR
            self::$config = new PHPAuthConfig($GLOBALS['pdo'], null, 'sql', 'pt_BR');
            // Se usar pacote de localização:
            // $loc = new \PHPAuth\PHPAuthLocalization('pt_BR');
            // self::$config = self::$config->setLocalization($loc->use());
        }
        return self::$config;
    }

    public static function auth(): PHPAuthAuth
    {
        if (!self::$auth) {
            self::$auth = new PHPAuthAuth($GLOBALS['pdo'], self::config());
        }
        return self::$auth;
    }
}
