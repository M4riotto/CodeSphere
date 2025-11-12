<?php
require_once __DIR__ . '/../../app/middlewares/auth_guard.php';
require_auth_or_403();
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard • EliteLearn</title>

  <!-- Fonte usada no seu tailwind.config -->
  <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;600;700;800;900&display=swap"
    rel="stylesheet">


  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Utilitárias equivalentes (sem @apply) -->
  <style>
    .text-muted-foreground {
      color: #d4d4d4;
    }

    .gradient-gold {
      background-image: linear-gradient(135deg, #ffb600, #ffcf66);
    }

    .shadow-premium {
      box-shadow: 0 12px 40px -10px rgba(0, 0, 0, 0.6);
    }

    .transition-smooth {
      transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
    }
  </style>
</head>

<body class="bg-background text-foreground antialiased">

  <?php require_once '../components/header.php' ?>

  <!-- Dashboard -->
  <div class="min-h-screen pb-12">
    <div class="container mx-auto px-4 lg:px-8 pt-24">
      <div class="mb-8">
        <h1 class="text-4xl font-bold mb-2">
          Bem-vindo ao seu <span class="gradient-gold bg-clip-text text-transparent">Dashboard</span>
        </h1>
        <p class="text-muted-foreground">Continue sua jornada de aprendizado</p>
      </div>

      <!-- Stats Grid -->
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Card 1 -->
        <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
          <div class="p-6">
            <div class="flex items-center gap-4">
              <div class="p-3 rounded-lg bg-primary/10 text-primary">
                <i data-lucide="book-open" class="h-6 w-6"></i>
              </div>
              <div>
                <div class="text-2xl font-bold">2</div>
                <div class="text-xs text-muted-foreground">Cursos Ativos</div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
          <div class="p-6">
            <div class="flex items-center gap-4">
              <div class="p-3 rounded-lg bg-primary/10 text-secondary">
                <i data-lucide="award" class="h-6 w-6"></i>
              </div>
              <div>
                <div class="text-2xl font-bold">3</div>
                <div class="text-xs text-muted-foreground">Certificados</div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
          <div class="p-6">
            <div class="flex items-center gap-4">
              <div class="p-3 rounded-lg bg-primary/10 text-primary">
                <i data-lucide="clock" class="h-6 w-6"></i>
              </div>
              <div>
                <div class="text-2xl font-bold">127</div>
                <div class="text-xs text-muted-foreground">Horas de Estudo</div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
          <div class="p-6">
            <div class="flex items-center gap-4">
              <div class="p-3 rounded-lg bg-primary/10 text-secondary">
                <i data-lucide="trending-up" class="h-6 w-6"></i>
              </div>
              <div>
                <div class="text-2xl font-bold">52%</div>
                <div class="text-xs text-muted-foreground">Progresso Médio</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Courses in Progress -->
      <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-2xl font-bold">Meus Cursos em Andamento</h2>
          <a href="./courses"
            class="inline-flex items-center rounded-2xl px-3 py-2 border border-border/50 hover:bg-white/5 text-sm transition">
            Explorar Mais Cursos
          </a>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
          <!-- Card Curso 1 -->
          <div
            class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur overflow-hidden group hover:shadow-premium transition-smooth">
            <div class="relative h-32 overflow-hidden">
              <img src="./public/src/assets/course-business.jpg" alt="Gestão Empresarial Avançada"
                class="w-full h-full object-cover transition-smooth group-hover:scale-110">
              <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent"></div>
            </div>
            <div class="px-6 pt-5">
              <h3 class="text-xl font-semibold">Gestão Empresarial Avançada</h3>
              <p class="text-sm text-muted-foreground">Próxima aula: Módulo 4: Estratégias de Marketing</p>
            </div>
            <div class="p-6">
              <div class="mb-4">
                <div class="flex items-center justify-between text-sm mb-2">
                  <span class="text-muted-foreground">21 de 32 aulas</span>
                  <span class="font-semibold gradient-gold bg-clip-text text-transparent">65%</span>
                </div>
                <!-- Progress 65% -->
                <div class="h-2 w-full rounded-full bg-border/50 overflow-hidden">
                  <div class="h-full rounded-full bg-primary" style="width:65%"></div>
                </div>
              </div>
              <a href="./courseDetail"
                class="inline-flex items-center justify-center w-full rounded-2xl px-4 py-2 bg-primary text-white hover:bg-primary/90 transition">
                Continuar Aprendendo
              </a>
            </div>
          </div>

          <!-- Card Curso 2 -->
          <div
            class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur overflow-hidden group hover:shadow-premium transition-smooth">
            <div class="relative h-32 overflow-hidden">
              <img src="./public/src/assets/course-tech.jpg" alt="Desenvolvimento Full Stack Elite"
                class="w-full h-full object-cover transition-smooth group-hover:scale-110">
              <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent"></div>
            </div>
            <div class="px-6 pt-5">
              <h3 class="text-xl font-semibold">Desenvolvimento Full Stack Elite</h3>
              <p class="text-sm text-muted-foreground">Próxima aula: Módulo 3: Node.js Avançado</p>
            </div>
            <div class="p-6">
              <div class="mb-4">
                <div class="flex items-center justify-between text-sm mb-2">
                  <span class="text-muted-foreground">18 de 45 aulas</span>
                  <span class="font-semibold gradient-gold bg-clip-text text-transparent">40%</span>
                </div>
                <!-- Progress 40% -->
                <div class="h-2 w-full rounded-full bg-border/50 overflow-hidden">
                  <div class="h-full rounded-full bg-primary" style="width:40%"></div>
                </div>
              </div>
              <a href="./courseDetail"
                class="inline-flex items-center justify-center w-full rounded-2xl px-4 py-2 bg-primary text-white hover:bg-primary/90 transition">
                Continuar Aprendendo
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
        <div class="px-6 pt-6">
          <h3 class="text-lg font-semibold">Atividade Recente</h3>
        </div>
        <div class="p-6">
          <div class="space-y-4">
            <div class="flex items-center justify-between py-3 border-b border-border/30">
              <div>
                <p class="font-medium">Completou a aula</p>
                <p class="text-sm text-muted-foreground">Gestão Empresarial</p>
              </div>
              <span class="text-xs text-muted-foreground">Há 2 horas</span>
            </div>
            <div class="flex items-center justify-between py-3 border-b border-border/30">
              <div>
                <p class="font-medium">Obteve certificado</p>
                <p class="text-sm text-muted-foreground">Marketing Digital</p>
              </div>
              <span class="text-xs text-muted-foreground">Há 1 dia</span>
            </div>
            <div class="flex items-center justify-between py-3">
              <div>
                <p class="font-medium">Iniciou novo módulo</p>
                <p class="text-sm text-muted-foreground">Full Stack Elite</p>
              </div>
              <span class="text-xs text-muted-foreground">Há 3 dias</span>
            </div>
          </div>
        </div>
      </div>
      <!-- /Recent Activity -->
    </div>
  </div>

  <script src="./public/src/js/tailwind.config.js"></script>
  <script src="./public/src/js/ui.js?v=<?php echo time()?>"></script>
</body>

</html>