<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>EliteLearn — Criar Conta</title>

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
                    <a href="login.html" class="inline-flex items-center gap-2">
                        <div class="h-11 w-11 rounded-2xl bg-primary/10 ring-1 ring-[color:var(--ringline)] flex items-center justify-center" style="--ringline: rgba(255,255,255,0.08);">
                            <span class="text-primary text-xl font-bold">E</span>
                        </div>
                        <span class="text-xl font-semibold tracking-wide">EliteLearn</span>
                    </a>

                    <h1 class="mt-8 text-4xl font-semibold leading-tight">
                        Crie sua conta e comece agora
                    </h1>
                    <p class="mt-3 text-muted">
                        Acesso a cursos, módulos e certificados — tudo em um só lugar.
                    </p>

                    <div class="mt-10 grid gap-4">
                        <div class="rounded-3xl border border-border/70 bg-card/40 backdrop-blur-xs p-5">
                            <p class="text-sm text-muted-foreground">
                                Configure seu perfil e receba recomendações de cursos.
                            </p>
                        </div>
                        <div class="rounded-3xl border border-border/70 bg-card/40 backdrop-blur-xs p-5">
                            <p class="text-sm text-muted-foreground">
                                Aprendizado com foco, tracking de progresso e quizzes inteligentes.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card de Registro -->
                <div class="flex">
                    <div class="w-full rounded-3xl border border-border/70 bg-card/40 backdrop-blur-xs shadow-premium p-7 md:p-10">
                        <div class="mb-6 flex items-center gap-3 lg:hidden">
                            <div class="h-10 w-10 rounded-2xl bg-primary/10 ring-1 ring-[color:var(--ringline)] flex items-center justify-center" style="--ringline: rgba(255,255,255,0.08);">
                                <span class="text-primary font-bold">E</span>
                            </div>
                            <span class="text-lg font-semibold">EliteLearn</span>
                        </div>

                        <h2 class="text-2xl font-semibold">Criar conta</h2>
                        <p class="mt-1 text-sm text-muted">Leva menos de 1 minuto.</p>

                        <form onsubmit="register(event)" method="POST" class="mt-6 grid gap-4">
                            <div>
                                <label for="name" class="block text-sm mb-2">Nome completo</label>
                                <input id="name" name="name" type="text" required
                                    class="w-full rounded-2xl border border-border bg-background/60 px-4 py-3 outline-none focus:ring-2 focus:ring-secondary focus:border-secondary placeholder:text-muted"
                                    placeholder="Seu nome" />
                            </div>

                            <div>
                                <label for="email" class="block text-sm mb-2">E-mail</label>
                                <input id="email" name="email" type="email" required
                                    class="w-full rounded-2xl border border-border bg-background/60 px-4 py-3 outline-none focus:ring-2 focus:ring-secondary focus:border-secondary placeholder:text-muted"
                                    placeholder="voce@exemplo.com" />
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="password" class="block text-sm mb-2">Senha</label>
                                    <input id="password" name="password" type="password" required
                                        class="w-full rounded-2xl border border-border bg-background/60 px-4 py-3 outline-none focus:ring-2 focus:ring-secondary focus:border-secondary placeholder:text-muted"
                                        placeholder="••••••••" />
                                </div>
                                <div>
                                    <label for="password_confirm" class="block text-sm mb-2">Confirmar senha</label>
                                    <input id="password_confirm" name="password_confirm" type="password" required
                                        class="w-full rounded-2xl border border-border bg-background/60 px-4 py-3 outline-none focus:ring-2 focus:ring-secondary focus:border-secondary placeholder:text-muted"
                                        placeholder="••••••••" />
                                </div>
                            </div>

                            <button type="submit"
                                class="mt-2 inline-flex w-full items-center justify-center rounded-2xl bg-primary px-4 py-3 font-semibold text-primary-foreground transition hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary/50">
                                Criar conta
                            </button>
                        </form>

                        <p class="mt-6 text-sm text-muted">
                            Já tem conta?
                            <a href="login" class="text-secondary hover:underline">Entrar</a>
                        </p>
                    </div>
                </div>

            </div>
            <p class="mt-8 text-center text-xs text-muted">
                © <span class="font-semibold">EliteLearn</span> — aprenda em alto nível.
            </p>
        </div>
    </div>

    <script src="./public/src/js/main.js?v=1.0.1"></script>

    <script src="./public/src/js/tailwind.config.js"></script>
    <script src="./public/src/js/ui.js?v=<?php echo time() ?>"></script>

</body>

</html>