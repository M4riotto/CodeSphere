<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Explore Nossos Cursos</title>

  <!-- Fonte usada pelo seu tailwind.config -->
  <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Utilitárias equivalentes do seu CSS (sem @apply) -->
  <style>
    /* O Tailwind (via config) NÃO cria text-muted-foreground automaticamente, então definimos aqui */
    .text-muted-foreground {
      color: #d4d4d4;
    }

    /* muted.foreground do seu config */

    /* Gradiente dourado equivalente ao que você usa como "gradient-gold" */
    .gradient-gold {
      background-image: linear-gradient(135deg, #ffb600, #ffcf66);
    }

    /* Sombra premium (equivalente à boxShadow.premium do config) */
    .shadow-premium {
      box-shadow: 0 12px 40px -10px rgba(0, 0, 0, 0.6);
    }
  </style>
</head>

<body class="bg-background text-foreground antialiased">

  <?php require_once '../components/header.php' ?>

  <!-- Página Courses -->
  <div class="min-h-screen pb-12">
    <div class="container mx-auto px-4 lg:px-8 pt-24">
      <div class="mb-8">
        <h1 class="text-4xl font-bold mb-2">
          Explore Nossos <span class="gradient-gold bg-clip-text text-transparent">Cursos</span>
        </h1>
        <p class="text-muted-foreground">Encontre o curso perfeito para sua jornada</p>
      </div>

      <!-- Search and Filter -->
      <div class="flex flex-col md:flex-row gap-4 mb-8">
        <div class="flex-1 relative">
          <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground"></i>
          <!-- <Input ... /> -->
          <input type="text" placeholder="Buscar cursos..."
            class="w-full pl-10 pr-3 py-2 rounded-2xl bg-card/50 border border-border/50 outline-none focus:ring-2 focus:ring-primary" />
        </div>
        <!-- <Button variant="outline"> -->
        <a href="#"
          class="md:w-auto inline-flex items-center justify-center rounded-2xl px-4 py-2 border border-border/50 hover:bg-card/50 transition">
          <i data-lucide="sliders-horizontal" class="mr-2 h-4 w-4"></i>
          Filtros
        </a>
      </div>

      <!-- Categories -->
      <div class="flex flex-wrap gap-2 mb-8">
        <!-- <Button variant={category==="Todos"?"default":"outline"} size="sm"> -->
        <a
          class="inline-flex items-center rounded-2xl px-3 py-1.5 bg-primary text-white text-sm hover:bg-primary/90 transition">Todos</a>
        <a
          class="inline-flex items-center rounded-2xl px-3 py-1.5 border border-border/50 text-sm hover:bg-card/50 transition">Negócios</a>
        <a
          class="inline-flex items-center rounded-2xl px-3 py-1.5 border border-border/50 text-sm hover:bg-card/50 transition">Tecnologia</a>
        <a
          class="inline-flex items-center rounded-2xl px-3 py-1.5 border border-border/50 text-sm hover:bg-card/50 transition">Design</a>
        <a
          class="inline-flex items-center rounded-2xl px-3 py-1.5 border border-border/50 text-sm hover:bg-card/50 transition">Marketing</a>
      </div>

      <!-- Courses Grid -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- CourseCard 1 -->
        <article class="rounded-2xl ring-1 ring-white/10 bg-card overflow-hidden shadow-premium">
          <div class="aspect-video overflow-hidden">
            <img src="./public/src/assets/course-business.jpg" alt="Gestão Empresarial Avançada"
              class="w-full h-full object-cover hover:scale-105 transition duration-500">
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
              <div class="font-bold">R$ 497</div>
            </div>
          </div>
        </article>

        <!-- CourseCard 2 -->
        <article class="rounded-2xl ring-1 ring-white/10 bg-card overflow-hidden shadow-premium">
          <div class="aspect-video overflow-hidden">
            <img src="./public/src/assets/course-tech.jpg" alt="Desenvolvimento Full Stack Elite"
              class="w-full h-full object-cover hover:scale-105 transition duration-500">
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
              <div class="font-bold">R$ 697</div>
            </div>
          </div>
        </article>

        <!-- CourseCard 3 -->
        <article class="rounded-2xl ring-1 ring-white/10 bg-card overflow-hidden shadow-premium">
          <div class="aspect-video overflow-hidden">
            <img src="./public/src/assets/course-design.jpg" alt="Design UI/UX Profissional"
              class="w-full h-full object-cover hover:scale-105 transition duration-500">
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
              <div class="font-bold">R$ 447</div>
            </div>
          </div>
        </article>

        <!-- CourseCard 4 -->
        <article class="rounded-2xl ring-1 ring-white/10 bg-card overflow-hidden shadow-premium">
          <div class="aspect-video overflow-hidden">
            <img src="./public/src/assets/course-business.jpg" alt="Marketing Digital 360°"
              class="w-full h-full object-cover hover:scale-105 transition duration-500">
          </div>
          <div class="p-5">
            <div class="mb-2 text-sm text-muted-foreground">Marketing</div>
            <h3 class="text-lg font-semibold leading-tight">Marketing Digital 360°</h3>
            <p class="mt-2 text-sm text-muted-foreground">
              Estratégias completas de marketing para dominar o mercado digital
            </p>
            <div class="mt-4 flex items-center justify-between">
              <div class="flex items-center gap-3 text-sm text-muted-foreground">
                <span class="inline-flex items-center gap-1"><i data-lucide="clock" class="w-4 h-4"></i> 45h</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="users" class="w-4 h-4"></i> 2100</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="award" class="w-4 h-4"></i> 4.7</span>
              </div>
              <div class="font-bold">R$ 547</div>
            </div>
          </div>
        </article>

        <!-- CourseCard 5 -->
        <article class="rounded-2xl ring-1 ring-white/10 bg-card overflow-hidden shadow-premium">
          <div class="aspect-video overflow-hidden">
            <img src="./public/src/assets/course-tech.jpg" alt="Python para Data Science"
              class="w-full h-full object-cover hover:scale-105 transition duration-500">
          </div>
          <div class="p-5">
            <div class="mb-2 text-sm text-muted-foreground">Tecnologia</div>
            <h3 class="text-lg font-semibold leading-tight">Python para Data Science</h3>
            <p class="mt-2 text-sm text-muted-foreground">
              Análise de dados e machine learning com Python profissional
            </p>
            <div class="mt-4 flex items-center justify-between">
              <div class="flex items-center gap-3 text-sm text-muted-foreground">
                <span class="inline-flex items-center gap-1"><i data-lucide="clock" class="w-4 h-4"></i> 50h</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="users" class="w-4 h-4"></i> 2800</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="award" class="w-4 h-4"></i> 4.8</span>
              </div>
              <div class="font-bold">R$ 597</div>
            </div>
          </div>
        </article>

        <!-- CourseCard 6 -->
        <article class="rounded-2xl ring-1 ring-white/10 bg-card overflow-hidden shadow-premium">
          <div class="aspect-video overflow-hidden">
            <img src="./public/src/assets/course-design.jpg" alt="Fotografia Profissional"
              class="w-full h-full object-cover hover:scale-105 transition duration-500">
          </div>
          <div class="p-5">
            <div class="mb-2 text-sm text-muted-foreground">Design</div>
            <h3 class="text-lg font-semibold leading-tight">Fotografia Profissional</h3>
            <p class="mt-2 text-sm text-muted-foreground">
              Da técnica à edição: torne-se um fotógrafo completo
            </p>
            <div class="mt-4 flex items-center justify-between">
              <div class="flex items-center gap-3 text-sm text-muted-foreground">
                <span class="inline-flex items-center gap-1"><i data-lucide="clock" class="w-4 h-4"></i> 30h</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="users" class="w-4 h-4"></i> 1500</span>
                <span class="inline-flex items-center gap-1"><i data-lucide="award" class="w-4 h-4"></i> 4.9</span>
              </div>
              <div class="font-bold">R$ 397</div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
  <script src="./public/src/js/tailwind.config.js"></script>
  <script src="./public/src/js/ui.js"></script>
  <script>
    // Lucide icons
    window.lucide && window.lucide.createIcons();

    // Mobile nav toggle
    const menuBtn = document.getElementById('menuBtn');
    const mobileNav = document.getElementById('mobileNav');
    if (menuBtn && mobileNav) {
      menuBtn.addEventListener('click', () => mobileNav.classList.toggle('hidden'));
    }
  </script>
</body>

</html>