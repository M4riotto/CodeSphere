<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin • Cursos</title>

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

    .text-destructive {
      color: #ff4444;
    }

    /* mapeado para error do seu config */
    .hover\:text-destructive:hover {
      color: #ff4444;
    }
  </style>
</head>

<body class="bg-background text-foreground antialiased">

  <?php require_once '../components/header.php' ?>

  <!-- Admin Courses -->
  <div class="min-h-screen pb-12">
    <div class="container mx-auto px-4 lg:px-8 pt-24">
      <div class="flex items-center justify-between mb-8">
        <div>
          <h1 class="text-4xl font-bold mb-2">
            Gerenciar <span class="gradient-gold bg-clip-text text-transparent">Cursos</span>
          </h1>
          <p class="text-muted-foreground">Crie e gerencie seus cursos</p>
        </div>
        <a href="./adminNewCourse"
          class="inline-flex items-center justify-center rounded-2xl px-5 py-3 bg-primary text-white hover:bg-primary/90 transition text-lg">
          <i data-lucide="plus" class="mr-2 h-5 w-5"></i>
          Novo Curso
        </a>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
          <div class="p-6">
            <div class="text-3xl font-bold gradient-gold bg-clip-text text-transparent mb-1">2</div>
            <div class="text-sm text-muted-foreground">Total de Cursos</div>
          </div>
        </div>
        <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
          <div class="p-6">
            <div class="text-3xl font-bold gradient-gold bg-clip-text text-transparent mb-1">5,600</div>
            <div class="text-sm text-muted-foreground">Total de Alunos</div>
          </div>
        </div>
        <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
          <div class="p-6">
            <div class="text-3xl font-bold gradient-gold bg-clip-text text-transparent mb-1">2</div>
            <div class="text-sm text-muted-foreground">Cursos Publicados</div>
          </div>
        </div>
        <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
          <div class="p-6">
            <div class="text-3xl font-bold gradient-gold bg-clip-text text-transparent mb-1">0</div>
            <div class="text-sm text-muted-foreground">Em Rascunho</div>
          </div>
        </div>
      </div>

      <!-- Courses List -->
      <div class="space-y-4">
        <!-- Card Curso 1 -->
        <div
          class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur overflow-hidden group hover:shadow-premium transition-smooth">
          <div class="flex flex-col md:flex-row">
            <div class="md:w-64 h-40 overflow-hidden">
              <img src="./public/src/assets/course-business.jpg" alt="Gestão Empresarial Avançada"
                class="w-full h-full object-cover group-hover:scale-110 transition-smooth">
            </div>
            <div class="flex-1 p-6">
              <div class="flex items-start justify-between mb-4">
                <div>
                  <h3 class="text-xl font-bold mb-2">Gestão Empresarial Avançada</h3>
                  <!-- <Badge className="gradient-gold border-0">Publicado</Badge> -->
                  <span
                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold gradient-gold text-black border-0">Publicado</span>
                </div>
                <div class="flex gap-2">
                  <!-- ghost icon buttons -->
                  <a href="/courses/1"
                    class="inline-flex items-center justify-center size-9 rounded-xl hover:bg-white/5 transition"
                    title="Visualizar">
                    <i data-lucide="eye" class="h-4 w-4"></i>
                  </a>
                  <a href="/admin/courses/1/edit"
                    class="inline-flex items-center justify-center size-9 rounded-xl hover:bg-white/5 transition"
                    title="Editar">
                    <i data-lucide="edit" class="h-4 w-4"></i>
                  </a>
                  <button
                    class="inline-flex items-center justify-center size-9 rounded-xl hover:bg-white/5 transition text-destructive hover:text-destructive"
                    title="Excluir">
                    <i data-lucide="trash-2" class="h-4 w-4"></i>
                  </button>
                </div>
              </div>
              <div class="flex flex-wrap gap-6 text-sm text-muted-foreground">
                <span>2400 alunos</span>
                <span>8 módulos</span>
                <span>32 aulas</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Card Curso 2 -->
        <div
          class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur overflow-hidden group hover:shadow-premium transition-smooth">
          <div class="flex flex-col md:flex-row">
            <div class="md:w-64 h-40 overflow-hidden">
              <img src="./public/src/assets/course-tech.jpg" alt="Desenvolvimento Full Stack Elite"
                class="w-full h-full object-cover group-hover:scale-110 transition-smooth">
            </div>
            <div class="flex-1 p-6">
              <div class="flex items-start justify-between mb-4">
                <div>
                  <h3 class="text-xl font-bold mb-2">Desenvolvimento Full Stack Elite</h3>
                  <span
                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold gradient-gold text-black border-0">Publicado</span>
                </div>
                <div class="flex gap-2">
                  <a href="/courses/2"
                    class="inline-flex items-center justify-center size-9 rounded-xl hover:bg-white/5 transition"
                    title="Visualizar">
                    <i data-lucide="eye" class="h-4 w-4"></i>
                  </a>
                  <a href="/admin/courses/2/edit"
                    class="inline-flex items-center justify-center size-9 rounded-xl hover:bg-white/5 transition"
                    title="Editar">
                    <i data-lucide="edit" class="h-4 w-4"></i>
                  </a>
                  <button
                    class="inline-flex items-center justify-center size-9 rounded-xl hover:bg-white/5 transition text-destructive hover:text-destructive"
                    title="Excluir">
                    <i data-lucide="trash-2" class="h-4 w-4"></i>
                  </button>
                </div>
              </div>
              <div class="flex flex-wrap gap-6 text-sm text-muted-foreground">
                <span>3200 alunos</span>
                <span>12 módulos</span>
                <span>45 aulas</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Courses List -->
    </div>
  </div>

  <script src="./public/src/js/tailwind.config.js"></script>
  <script src="./public/src/js/ui.js"></script>
  <script>
    // Lucide
    window.lucide && window.lucide.createIcons();

    // Mobile nav
    const menuBtn = document.getElementById('menuBtn');
    const mobileNav = document.getElementById('mobileNav');
    if (menuBtn && mobileNav) {
      menuBtn.addEventListener('click', () => mobileNav.classList.toggle('hidden'));
    }
  </script>
</body>

</html>