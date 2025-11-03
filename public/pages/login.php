<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Teste PHPAuth - Registro, Login e Recuperação</title>
  <style>
    body {
      background: #f0f2f5;
      font-family: Arial, sans-serif;
      padding: 40px;
    }
    h2 {
      color: #333;
    }
    form {
      background: #fff;
      padding: 20px;
      margin-bottom: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      width: 350px;
    }
    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }
    input[type="email"],
    input[type="password"],
    input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      background: #2563eb;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background: #1e40af;
    }
    .container {
      display: flex;
      gap: 40px;
      flex-wrap: wrap;
    }
  </style>
</head>
<body>
  <h1>Teste PHPAuth</h1>
  <p>Preencha os formulários abaixo para testar as rotas de autenticação.</p>

  <div class="container">
    <!-- Formulário de Registro -->
    <form action="app/routes/auth/auth_register.php" method="POST">
      <h2>Registro</h2>
      <label for="email">E-mail</label>
      <input type="email" name="email" id="email" required>

      <label for="password">Senha</label>
      <input type="password" name="password" id="password" required>

      <label for="password_confirm">Confirmar Senha</label>
      <input type="password" name="password_confirm" id="password_confirm" required>

      <button type="submit">Registrar</button>
    </form>

    <!-- Formulário de Login -->
    <form action="app/routes/auth/auth_login.php" method="POST">
      <h2>Login</h2>
      <label for="log_email">E-mail</label>
      <input type="email" name="email" id="log_email" required>

      <label for="log_password">Senha</label>
      <input type="password" name="password" id="log_password" required>

      <label>
        <input type="checkbox" name="remember"> Lembrar-me
      </label>
      <button type="submit">Entrar</button>
    </form>

    <!-- Formulário de Recuperação -->
    <form action="app/routes/auth/auth_request_reset.php" method="POST">
      <h2>Esqueci a Senha</h2>
      <label for="fog_email">E-mail</label>
      <input type="email" name="email" id="fog_email" required>

      <button type="submit">Enviar Link de Redefinição</button>
    </form>
  </div>

  <p>💡 Após registrar, veja o e-mail de ativação (ou pegue o código da tabela <code>phpauth_requests</code>).</p>
</body>
</html>
