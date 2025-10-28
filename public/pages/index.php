<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EliteLearn • Educação Premium</title>

  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Carrega sua config ANTES do CDN -->
  <script defer src="./js/main.js"></script>

  <!-- Conecta a config ao Tailwind Play CDN -->
  <script>
    window.tailwind = window.tailwind || {};
    window.tailwind.config = window.tailwindConfig || {};
  </script>

  <!-- Tailwind Play CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Estilos auxiliares (sem @apply) -->
  <style>
    :root {
      /* gradiente "ouro" */
      --gold-1: #fff7c4;
      --gold-2: #ffd97a;
      --gold-3: #f7b500;
      /* gradiente primário */
      --p-1: #573ff4;
      --p-2: #7371fb;
      --p-3: #1248be;
    }

    .gradient-gold {
      background-image: linear-gradient(90deg, var(--gold-1), var(--gold-2), var(--gold-3));
    }

    .gradient-primary {
      background-image: linear-gradient(135deg, var(--p-1), var(--p-2) 40%, var(--p-3));
    }

    .shadow-premium {
      box-shadow: 0 12px 40px -10px rgba(0, 0, 0, 0.6);
    }

    .text-muted-foreground {
      color: #a3a3a3;
    }

    .ringline {
      box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.08);
    }

    /* Badge suave */
    .badge-soft {
      background: rgba(244, 63, 94, 0.12);
      border: 1px solid rgba(244, 63, 94, 0.25);
      color: #ffd97a;
    }
  </style>
</head>

<body class="bg-background text-foreground antialiased selection:bg-primary/30">

  <?php require_once '../components/header.php' ?>

  <!-- Hero -->
  <section class="relative pt-28 pb-20 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
      <img src="./public/src/assets/hero-learning.jpg" alt="Hero" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-background via-background/95 to-transparent"></div>

    <div class="container relative z-10">
      <div class="max-w-3xl">
        <div class="inline-block mb-4 px-4 py-2 rounded-full badge-soft">
          <span class="text-sm font-semibold gradient-gold bg-clip-text text-transparent">
            Educação Premium &amp; Certificada
          </span>
        </div>
        <h1 class="text-5xl lg:text-7xl font-bold mb-6 leading-tight">
          Transforme sua
          <span class="gradient-gold bg-clip-text text-transparent"> Carreira </span>
          com Cursos de Elite
        </h1>
        <p class="text-xl text-muted-foreground mb-8 leading-relaxed">
          Aprenda com os melhores profissionais do mercado. Certificados reconhecidos,
          conteúdo exclusivo e suporte personalizado para seu sucesso.
        </p>
        <div class="flex flex-wrap gap-4">
          <a href="./courses" class="inline-flex items-center rounded-2xl px-5 py-3 bg-gradient-to-r from-primary to-primary/80 text-primary-foreground hover:opacity-95 text-base shadow-premium transition">
            Explorar Cursos
          </a>
          <a href="./myDashboard" class="inline-flex items-center rounded-2xl px-5 py-3 ring-1 ring-white/10 hover:bg-white/5 text-base transition">
            Acessar Dashboard
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="py-16 border-y border-border/50">
    <div class="container">
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- 1 -->
        <div class="text-center">
          <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl gradient-primary mb-3 shadow-premium ringline">
            <i data-lucide="users" class="w-6 h-6 text-white"></i>
          </div>
          <div class="text-3xl font-bold gradient-gold bg-clip-text text-transparent mb-1">
            50k+
          </div>
          <div class="text-sm text-muted-foreground">Alunos Ativos</div>
        </div>
        <!-- 2 -->
        <div class="text-center">
          <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl gradient-primary mb-3 shadow-premium ringline">
            <i data-lucide="book-open" class="w-6 h-6 text-white"></i>
          </div>
          <div class="text-3xl font-bold gradient-gold bg-clip-text text-transparent mb-1">
            200+
          </div>
          <div class="text-sm text-muted-foreground">Cursos Premium</div>
        </div>
        <!-- 3 -->
        <div class="text-center">
          <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl gradient-primary mb-3 shadow-premium ringline">
            <i data-lucide="award" class="w-6 h-6 text-white"></i>
          </div>
          <div class="text-3xl font-bold gradient-gold bg-clip-text text-transparent mb-1">
            15k+
          </div>
          <div class="text-sm text-muted-foreground">Certificados</div>
        </div>
        <!-- 4 -->
        <div class="text-center">
          <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl gradient-primary mb-3 shadow-premium ringline">
            <i data-lucide="clock" class="w-6 h-6 text-white"></i>
          </div>
          <div class="text-3xl font-bold gradient-gold bg-clip-text text-transparent mb-1">
            2000h+
          </div>
          <div class="text-sm text-muted-foreground">Conteúdo</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Courses -->
  <section id="cursos" class="py-20">
    <div class="container">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold mb-4">
          Cursos em <span class="gradient-gold bg-clip-text text-transparent">Destaque</span>
        </h2>
        <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
          Selecionamos os melhores cursos para você alcançar seus objetivos profissionais
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Card 1 -->
        <article class="rounded-2xl ring-1 ring-white/10 bg-card/60 backdrop-blur-xs overflow-hidden shadow-premium">
          <div class="aspect-video overflow-hidden">
            <img src="./public/src/assets/course-business.jpg" alt="Gestão Empresarial Avançada" class="w-full h-full object-cover hover:scale-105 transition duration-500">
          </div>
          <div class="p-5">
            <div class="mb-2 text-sm text-muted-foreground">Negócios</div>
            <h3 class="text-lg font-semibold leading-tight">Gestão Empresarial Avançada</h3>
            <p class="mt-2 text-sm text-muted-foreground">
              Domine estratégias de gestão e liderança para transformar sua carreira executiva
            </p>
            <div class="mt-4 flex items-center justify-between">
              <div class="flex items-center gap-3 text-sm text-muted-foreground">
                <span class="inline-flex items-center gap-1"><i data-lucide="clock" class="w-4 h-4"></i> 40h</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="users" class="w-4 h-4"></i> 2400</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="award" class="w-4 h-4"></i> 4.9</span>
              </div>
              <div class="font-bold gradient-gold bg-clip-text text-transparent">R$ 497</div>
            </div>
          </div>
        </article>

        <!-- Card 2 -->
        <article class="rounded-2xl ring-1 ring-white/10 bg-card/60 backdrop-blur-xs overflow-hidden shadow-premium">
          <div class="aspect-video overflow-hidden">
            <img src="./public/src/assets/course-tech.jpg" alt="Desenvolvimento Full Stack Elite" class="w-full h-full object-cover hover:scale-105 transition duration-500">
          </div>
          <div class="p-5">
            <div class="mb-2 text-sm text-muted-foreground">Tecnologia</div>
            <h3 class="text-lg font-semibold leading-tight">Desenvolvimento Full Stack Elite</h3>
            <p class="mt-2 text-sm text-muted-foreground">
              Do zero ao profissional: React, Node.js e tecnologias modernas
            </p>
            <div class="mt-4 flex items-center justify-between">
              <div class="flex items-center gap-3 text-sm text-muted-foreground">
                <span class="inline-flex items-center gap-1"><i data-lucide="clock" class="w-4 h-4"></i> 60h</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="users" class="w-4 h-4"></i> 3200</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="award" class="w-4 h-4"></i> 4.8</span>
              </div>
              <div class="font-bold gradient-gold bg-clip-text text-transparent">R$ 697</div>
            </div>
          </div>
        </article>

        <!-- Card 3 -->
        <article class="rounded-2xl ring-1 ring-white/10 bg-card/60 backdrop-blur-xs overflow-hidden shadow-premium">
          <div class="aspect-video overflow-hidden">
            <img src="./public/src/assets/course-design.jpg" alt="Design UI/UX Profissional" class="w-full h-full object-cover hover:scale-105 transition duration-500">
          </div>
          <div class="p-5">
            <div class="mb-2 text-sm text-muted-foreground">Design</div>
            <h3 class="text-lg font-semibold leading-tight">Design UI/UX Profissional</h3>
            <p class="mt-2 text-sm text-muted-foreground">
              Crie interfaces incríveis e experiências memoráveis para usuários
            </p>
            <div class="mt-4 flex items-center justify-between">
              <div class="flex items-center gap-3 text-sm text-muted-foreground">
                <span class="inline-flex items-center gap-1"><i data-lucide="clock" class="w-4 h-4"></i> 35h</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="users" class="w-4 h-4"></i> 1800</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="award" class="w-4 h-4"></i> 4.9</span>
              </div>
              <div class="font-bold gradient-gold bg-clip-text text-transparent">R$ 447</div>
            </div>
          </div>
        </article>
      </div>

      <div class="text-center">
        <a href="./courses" class="inline-flex items-center rounded-2xl px-5 py-3 ring-1 ring-white/10 hover:bg-white/5 text-base transition">
          Ver Todos os Cursos
        </a>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-20">
    <div class="container">
      <div class="relative overflow-hidden rounded-2xl gradient-primary p-12 lg:p-16 shadow-premium">
        <div class="absolute inset-0 opacity-10">
          <div class="absolute inset-0" style="
            background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0);
            background-size: 40px 40px;">
          </div>
        </div>
        <div class="relative z-10 text-center max-w-3xl mx-auto">
          <h2 class="text-4xl lg:text-5xl font-bold mb-4">
            Pronto para o Próximo Nível?
          </h2>
          <p class="text-xl text-primary-foreground/90 mb-8">
            Junte-se a milhares de profissionais que transformaram suas carreiras
          </p>
          <a href="#cursos" class="inline-flex items-center rounded-2xl px-6 py-3 bg-gradient-to-r from-primary to-primary/80 text-primary-foreground hover:opacity-95 text-lg shadow-premium transition">
            Começar Agora
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="border-t border-border/50 py-8">
    <div class="container text-center text-muted-foreground">
      <p>&copy; 2024 CodesPhere. Transformando carreiras através da educação premium.</p>
    </div>
  </footer>

  <script src="./public/src/js/tailwind.config.js"></script>
  <script src="./public/src/js/ui.js?v=<?php echo time()?>"></script>
</body>

</html>