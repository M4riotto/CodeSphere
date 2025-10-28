<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin • Novo Curso</title>

  <!-- Fonte do seu tailwind.config -->
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

    .hover\:text-destructive:hover {
      color: #ff4444;
    }
  </style>
</head>

<body class="bg-background text-foreground antialiased">
  <!-- Navbar (equivalente ao <Navbar />) -->

  <?php require_once '../components/header.php' ?>

  <!-- Admin New Course -->
  <div class="min-h-screen pb-12">
    <div class="container mx-auto px-4 lg:px-8 pt-24 max-w-5xl">
      <div class="mb-8">
        <h1 class="text-4xl font-bold mb-2">
          Criar <span class="gradient-gold bg-clip-text text-transparent">Novo Curso</span>
        </h1>
        <p class="text-muted-foreground">Preencha as informações do seu curso</p>
      </div>

      <div class="space-y-6">
        <!-- Basic Info -->
        <section class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
          <div class="px-6 pt-6">
            <h2 class="text-lg font-semibold">Informações Básicas</h2>
          </div>
          <div class="p-6 space-y-4">
            <div class="grid md:grid-cols-2 gap-4">
              <div class="space-y-2">
                <label class="block text-sm">Título do Curso</label>
                <input type="text" placeholder="Ex: Gestão Empresarial Avançada"
                  class="w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />
              </div>
              <div class="space-y-2">
                <label class="block text-sm">Categoria</label>
                <!-- Select -->
                <div class="relative">
                  <select
                    class="appearance-none w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 pr-8 outline-none focus:ring-2 focus:ring-primary">
                    <option value="" selected disabled>Selecione uma categoria</option>
                    <option value="business">Negócios</option>
                    <option value="tech">Tecnologia</option>
                    <option value="design">Design</option>
                    <option value="marketing">Marketing</option>
                  </select>
                  <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 opacity-70"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="m6 9 6 6 6-6" />
                  </svg>
                </div>
              </div>
            </div>

            <div class="space-y-2">
              <label class="block text-sm">Descrição</label>
              <textarea placeholder="Descreva o curso e o que os alunos vão aprender..."
                class="w-full min-h-24 bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary"></textarea>
            </div>

            <div class="grid md:grid-cols-3 gap-4">
              <div class="space-y-2">
                <label class="block text-sm">Preço (R$)</label>
                <input type="number" placeholder="497"
                  class="w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />
              </div>
              <div class="space-y-2">
                <label class="block text-sm">Duração (horas)</label>
                <input type="number" placeholder="40"
                  class="w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />
              </div>
              <div class="space-y-2">
                <label class="block text-sm">Nível</label>
                <div class="relative">
                  <select
                    class="appearance-none w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 pr-8 outline-none focus:ring-2 focus:ring-primary">
                    <option value="" selected disabled>Nível</option>
                    <option value="beginner">Iniciante</option>
                    <option value="intermediate">Intermediário</option>
                    <option value="advanced">Avançado</option>
                  </select>
                  <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 opacity-70"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="m6 9 6 6 6-6" />
                  </svg>
                </div>
              </div>
            </div>

            <div class="space-y-2">
              <label class="block text-sm">Imagem do Curso</label>
              <label
                class="block border-2 border-dashed border-border rounded-lg p-8 text-center hover:border-primary/50 transition-smooth cursor-pointer">
                <input type="file" accept="image/png,image/jpeg" class="hidden" />
                <i data-lucide="upload" class="h-8 w-8 mx-auto mb-2 text-muted-foreground"></i>
                <p class="text-sm text-muted-foreground">Clique para fazer upload ou arraste a imagem aqui</p>
                <p class="text-xs text-muted-foreground mt-1">PNG, JPG até 5MB</p>
              </label>
            </div>
          </div>
        </section>

        <!-- Course Content -->
        <section class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
          <div class="px-6 pt-6 flex items-center justify-between">
            <h2 class="text-lg font-semibold">Conteúdo do Curso</h2>
            <button id="addModuleBtn"
              class="inline-flex items-center rounded-2xl px-3 py-2 border border-border/60 hover:bg-white/5 text-sm transition">
              <i data-lucide="plus" class="mr-2 h-4 w-4"></i>
              Adicionar Módulo
            </button>
          </div>

          <div id="modulesContainer" class="p-6 space-y-6">
            <!-- Módulos serão inseridos aqui via JS -->
          </div>
        </section>

        <!-- Actions -->
        <div class="flex gap-4">
          <a href="#"
            class="inline-flex items-center justify-center rounded-2xl px-5 py-3 bg-primary text-white hover:bg-primary/90 transition text-lg">
            Publicar Curso
          </a>
          <a href="#"
            class="inline-flex items-center justify-center rounded-2xl px-5 py-3 border border-border/60 hover:bg-white/5 transition text-lg">
            Salvar Rascunho
          </a>
        </div>
      </div>
    </div>
  </div>

  <script src="./public/src/js/tailwind.config.js"></script>
  <script src="./public/src/js/ui.js"></script>

  <script>
    // Lucide + Mobile nav
    window.lucide && window.lucide.createIcons();
    const menuBtn = document.getElementById('menuBtn');
    const mobileNav = document.getElementById('mobileNav');
    if (menuBtn && mobileNav) menuBtn.addEventListener('click', () => mobileNav.classList.toggle('hidden'));

    // ----- Dinâmica de módulos/aulas (equivalente ao useState) -----
    const modulesContainer = document.getElementById('modulesContainer');
    const addModuleBtn = document.getElementById('addModuleBtn');

    let moduleCount = 0;

    function createModuleElement(moduleId, indexLabel) {
      const wrap = document.createElement('div');
      wrap.className = 'p-4 rounded-lg bg-background/30 space-y-4';
      wrap.dataset.moduleId = moduleId;

      wrap.innerHTML = `
        <div class="flex items-start gap-4">
          <div class="flex-1 space-y-2">
            <label class="block text-sm">Módulo ${indexLabel}</label>
            <input type="text" placeholder="Nome do módulo" class="w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />
          </div>
          <button type="button" class="remove-module inline-flex items-center justify-center rounded-xl size-9 hover:bg-white/5 transition text-destructive hover:text-destructive" title="Remover módulo">
            <i data-lucide="x" class="h-4 w-4"></i>
          </button>
        </div>

        <div class="pl-4 space-y-3" data-lessons></div>

        <button type="button" class="add-lesson inline-flex items-center rounded-2xl px-3 py-2 border border-border/60 hover:bg-white/5 text-sm w-full transition">
          <i data-lucide="plus" class="mr-2 h-4 w-4"></i>
          Adicionar Aula
        </button>
      `;

      // Primeiro lesson
      const lessonsWrap = wrap.querySelector('[data-lessons]');
      lessonsWrap.appendChild(createLessonElement(moduleId, 1));

      // Eventos
      wrap.querySelector('.remove-module').addEventListener('click', () => {
        wrap.remove();
      });

      wrap.querySelector('.add-lesson').addEventListener('click', () => {
        const count = lessonsWrap.querySelectorAll('[data-lesson-id]').length + 1;
        lessonsWrap.appendChild(createLessonElement(moduleId, count));
        refreshIcons();
      });

      return wrap;
    }

    function createLessonElement(moduleId, lessonIndex) {
      const row = document.createElement('div');
      row.className = 'flex items-center gap-3';
      row.dataset.lessonId = `${moduleId}-${lessonIndex}`;

      row.innerHTML = `
        <input type="text" placeholder="Aula ${lessonIndex}" class="flex-1 bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />

        <div class="relative">
          <select class="appearance-none w-32 bg-background/50 rounded-2xl border border-border/60 px-3 py-2 pr-8 outline-none focus:ring-2 focus:ring-primary">
            <option value="video" selected>Vídeo</option>
            <option value="activity">Atividade</option>
            <option value="text">Texto</option>
          </select>
          <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 opacity-70" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m6 9 6 6 6-6"/></svg>
        </div>

        <button type="button" class="inline-flex items-center justify-center rounded-xl size-9 hover:bg-white/5 transition" title="Upload">
          <i data-lucide="upload" class="h-4 w-4"></i>
        </button>
        <button type="button" class="remove-lesson inline-flex items-center justify-center rounded-xl size-9 hover:bg-white/5 transition text-destructive hover:text-destructive" title="Remover aula">
          <i data-lucide="x" class="h-4 w-4"></i>
        </button>
      `;

      row.querySelector('.remove-lesson').addEventListener('click', () => row.remove());
      return row;
    }

    function addModule() {
      moduleCount += 1;
      const moduleEl = createModuleElement(String(moduleCount), moduleCount);
      modulesContainer.appendChild(moduleEl);
      refreshIcons();
    }

    function refreshIcons() {
      window.lucide && window.lucide.createIcons();
    }

    // Inicial: 1 módulo com 1 aula
    addModule();
    addModuleBtn.addEventListener('click', addModule);
  </script>
</body>

</html>