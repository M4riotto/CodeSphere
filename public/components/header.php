<?php
require_once __DIR__ . '../../../app/services/AuthService.php';

$svc = new AuthService();

?>

<!-- Navbar -->
<header class="fixed top-0 inset-x-0 z-50 border-b border-[color:var(--tw-border,#555555)]/60 backdrop-blur-xs/5 bg-background/80">
    <div class="container flex items-center justify-between py-4">
        <a href="#" class="flex items-center gap-3">
            <div class="size-9 rounded-2xl gradient-primary"></div>
            <span class="text-lg font-semibold tracking-tight">EliteLearn</span>
        </a>

        <nav class="hidden md:flex items-center gap-8 text-sm">
            <a class="hover:text-primary transition" href="./index">Início</a>
            <a class="hover:text-primary transition" href="./courses">Cursos</a>
            <a class="hover:text-primary transition" href="#sobre">Sobre</a>
            <a class="hover:text-primary transition" href="#contato">Contato</a>
            <a class="hover:text-primary transition" href="./adminCourses">Admin</a>
        </nav>

        <div class="hidden md:flex items-center gap-3">
            <a href="./myDashboard" class="inline-flex items-center rounded-2xl px-4 py-2 ring-1 ring-white/10 hover:bg-white/5 transition">
                Acessar Dashboard
            </a>
            <a href="./courses" class="inline-flex items-center rounded-2xl px-4 py-2 bg-primary text-primary-foreground hover:bg-primary/90 transition">
                Explorar Cursos
            </a>

            <?php
            if ($svc->isLogged()) {
                echo (' 
                 <a href="./profile" class="inline-flex items-center rounded-2xl px-4 py-2 text-primary-foreground hover:bg-primary/90 transition">
                <i data-lucide="user"></i> Perfil
            </a>
            <a onclick="logout()" class="inline-flex items-center rounded-2xl px-4 py-2 text-primary-foreground hover:bg-primary/90 transition">
                            <i data-lucide="door-closed"></i> Sair
                        </a>');
            } else {
                echo (' <a href="./login" class="inline-flex items-center rounded-2xl px-4 py-2 text-primary-foreground hover:bg-primary/90 transition">
                            <i data-lucide="log-in"></i> Login
                        </a>');
            }
            ?>

        </div>

        <button id="menuBtn" class="md:hidden inline-flex items-center rounded-2xl px-3 py-2 ring-1 ring-white/10">
            Menu
        </button>
    </div>

    <!-- Mobile nav -->
    <div id="mobileNav" class="md:hidden hidden border-t border-border/60 bg-background/95">
        <div class="container py-3 grid gap-2">
            <a class="py-2 hover:text-primary transition" href="./index">Início</a>
            <a class="py-2 hover:text-primary transition" href="./courses">Cursos</a>
            <a class="py-2 hover:text-primary transition" href="#sobre">Sobre</a>
            <a class="py-2 hover:text-primary transition" href="#contato">Contato</a>
            <a class="hover:text-primary transition" href="./adminCourses">Admin</a>
            <div class="pt-2 flex gap-2">
                <a href="./myDashboard" class="flex-1 inline-flex items-center justify-center rounded-2xl px-4 py-2 ring-1 ring-white/10 hover:bg-white/5 transition">
                    Dashboard
                </a>
                <a href="./courses" class="flex-1 inline-flex items-center justify-center rounded-2xl px-4 py-2 bg-primary text-primary-foreground hover:bg-primary/90 transition">
                    Cursos
                </a>
                <a href="./profile" class="inline-flex items-center rounded-2xl px-4 py-2 text-primary-foreground hover:bg-primary/90 transition">
                    <i data-lucide="user"></i> Perfil
                </a>
            </div>
        </div>
    </div>
</header>

<script src="./public/src/js/main.js?v=1.0.4"></script>
