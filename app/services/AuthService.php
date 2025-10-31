<?php
require_once __DIR__ . '/../infra/auth/PHPAuthFactory.php';

class AuthService
{
    private $auth;

    public function __construct()
    {
        $this->auth = PHPAuthFactory::auth();
    }

    /**
     * Registrar usuário.
     * $captcha: passe o token do reCAPTCHA se usar; caso contrário, deixe vazio.
     */
    public function register(string $email, string $password, string $repeatPassword, array $params = [], string $captcha = '', bool $requireActivation = false): array
    {
        // Algumas versões do PHPAuth exigem string no $captcha_response (nada de null)
        $res = $this->auth->register($email, $password, $repeatPassword, $params, $captcha, $requireActivation);
        return $res; // ['error'=>bool, 'message'=>string, 'uid'=>...]
    }

    public function activate(string $key): array
    {
        return $this->auth->activate($key);
    }

    public function login(string $email, string $password, bool $remember = false): array
    {
        $res = $this->auth->login($email, $password, $remember);
        return $res; // ['error'=>bool, 'message'=>string, 'hash'=>..., 'expire'=>...]
    }

    public function logout(?string $hash = null): bool
    {
        if (!$hash && method_exists($this->auth, 'getSessionHash')) {
            $hash = $this->auth->getCurrentSessionHash();
        }
        return $hash ? $this->auth->logout($hash) : false;
    }

    public function isLogged(): bool
    {
        return $this->auth->isLogged();
    }

    public function getCurrentSessionHash(): ?string
    {
        return $this->auth->getCurrentSessionHash();
    }

    public function getCurrentUser(): ?array
    {
        $uid = $this->auth->getCurrentUID();
        if (!$uid) return null;
        return $this->auth->getUser($uid);
    }

    public function resendActivation(string $email): array
    {
        return $this->auth->resendActivation($email);
    }

    public function requestReset(string $email): array
    {
        return $this->auth->requestReset($email);
    }

    public function resetPassword(string $key, string $password, string $repeat): array
    {
        // Compat com versões diferentes do PHPAuth
        if (method_exists($this->auth, 'resetPass')) {
            return $this->auth->resetPass($key, $password, $repeat);
        }
        return ['error' => true, 'message' => 'Método de reset não disponível nesta versão.'];
    }

    public function changePassword(string $password, string $new, string $repeat): array
    {
        $uid = $this->auth->getCurrentUID();
        return $this->auth->changePassword($uid, $password, $new, $repeat);
    }

    public function changeEmail(string $email, string $password): array
    {
        $uid = $this->auth->getCurrentUID();
        return $this->auth->changeEmail($uid, $email, $password);
    }

    public function deleteAccount(string $password): array
    {
        $uid = $this->auth->getCurrentUID();
        return $this->auth->deleteUser($uid, $password);
    }

    // Hook opcional pro reCAPTCHA se o PHPAuth pedir "verify"
    public function checkCaptcha(string $captcha): bool
    {
        return true; // implemente se usar reCAPTCHA
    }
}
