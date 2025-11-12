<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EliteLearn — Login</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>


  <!-- Fonte Maven Pro -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body class="min-h-full bg-background text-foreground font-sans antialiased">
  <div class="min-h-screen flex items-center">
    <div class="container">
      <div class="mx-auto grid lg:grid-cols-2 gap-8 max-w-6xl">
        <!-- Lado esquerdo (branding) -->
        <div class="hidden lg:flex flex-col justify-center">
          <a href="#" class="inline-flex items-center gap-2">
            <div class="h-11 w-11 rounded-2xl bg-primary/10 ring-1 ring-[color:var(--ringline)] flex items-center justify-center" style="--ringline: rgba(255,255,255,0.08);">
              <span class="text-primary text-xl font-bold">E</span>
            </div>
            <span class="text-xl font-semibold tracking-wide">EliteLearn</span>
          </a>

          <h1 class="mt-8 text-4xl font-semibold leading-tight">
            Bem-vindo de volta 👋
          </h1>
          <p class="mt-3 text-muted">
            Entre para continuar seus cursos e acompanhar seu progresso.
          </p>

          <div class="mt-10 grid gap-4">
            <div class="rounded-3xl border border-border/70 bg-card/40 backdrop-blur-xs p-5">
              <p class="text-sm text-muted-foreground">
                Acesse rapidamente seus módulos, aulas e quizzes em um ambiente premium.
              </p>
            </div>
            <div class="rounded-3xl border border-border/70 bg-card/40 backdrop-blur-xs p-5">
              <p class="text-sm text-muted-foreground">
                Design escuro confortável e foco em performance — seu aprendizado sem distrações.
              </p>
            </div>
          </div>
        </div>

        <!-- Card de Login -->
        <div class="flex">
          <div class="w-full rounded-3xl border border-border/70 bg-card/40 backdrop-blur-xs shadow-premium p-7 md:p-10">
            <div class="mb-6 flex items-center gap-3 lg:hidden">
              <div class="h-10 w-10 rounded-2xl bg-primary/10 ring-1 ring-[color:var(--ringline)] flex items-center justify-center" style="--ringline: rgba(255,255,255,0.08);">
                <span class="text-primary font-bold">E</span>
              </div>
              <span class="text-lg font-semibold">EliteLearn</span>
            </div>

            <h2 class="text-2xl font-semibold">Entrar</h2>
            <p class="mt-1 text-sm text-muted">Use seu e-mail e senha para acessar.</p>

            <form onsubmit="login(event)" method="POST" class="mt-6 grid gap-4">
              <div>
                <label for="email" class="block text-sm mb-2">E-mail</label>
                <input id="email" name="email" type="email" required
                  class="w-full rounded-2xl border border-border bg-background/60 px-4 py-3 outline-none focus:ring-2 focus:ring-secondary focus:border-secondary placeholder:text-muted"
                  placeholder="voce@exemplo.com" />
              </div>

              <div>
                <div class="flex items-center justify-between">
                  <label for="password" class="block text-sm mb-2">Senha</label>
                  <a href="reset.html" class="text-sm text-secondary hover:underline">Esqueci a senha</a>
                </div>
                <input id="password" name="password" type="password" required
                  class="w-full rounded-2xl border border-border bg-background/60 px-4 py-3 outline-none focus:ring-2 focus:ring-secondary focus:border-secondary placeholder:text-muted"
                  placeholder="••••••••" />
              </div>

              <label class="inline-flex items-center gap-2 select-none">
                <input type="checkbox" name="remember"
                  class="h-4 w-4 rounded border-border bg-background text-primary focus:ring-2 focus:ring-primary/50" />
                <span class="text-sm text-muted">Lembrar-me</span>
              </label>

              <button type="submit"
                class="mt-2 inline-flex w-full items-center justify-center rounded-2xl bg-primary px-4 py-3 font-semibold text-primary-foreground transition hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary/50">
                Entrar
              </button>
            </form>

            <p class="mt-6 text-sm text-muted">
              Ainda não tem conta?
              <a href="register" class="text-secondary hover:underline">Criar conta</a>
            </p>
          </div>
        </div>

      </div>
      <p class="mt-8 text-center text-xs text-muted">
        © <span class="font-semibold">EliteLearn</span> — alta performance no aprendizado.
      </p>
    </div>
  </div>
  <script src="./public/src/js/main.js?v=1.0.2"></script>

  <script src="./public/src/js/tailwind.config.js"></script>
  <script src="./public/src/js/ui.js"></script>

</html>