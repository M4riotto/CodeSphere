<?php
require_once __DIR__ . '/../../app/middlewares/auth_guard.php';
require_auth_or_403();
?>

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
                <label for="titleInput" class="block text-sm">Título do Curso</label>
                <input id="titleInput" type="text" placeholder="Ex: Gestão Empresarial Avançada"
                  class="w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />
              </div>
              <div class="space-y-2">
                <label for="categorySelect" class="block text-sm">Categoria</label>
                <div class="relative">
                  <!-- use IDs reais do banco quando popular dinamicamente -->
                  <select id="categorySelect"
                    class="appearance-none w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 pr-8 outline-none focus:ring-2 focus:ring-primary">
                    <option value="" selected disabled>Selecione uma categoria</option>
                    <option value="1">Negócios</option>
                    <option value="2">Tecnologia</option>
                    <option value="3">Design</option>
                    <option value="4">Marketing</option>
                  </select>
                  <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 opacity-70"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="m6 9 6 6 6-6" />
                  </svg>
                </div>
              </div>
            </div>

            <div class="space-y-2">
              <label for="descriptionInput" class="block text-sm">Descrição</label>
              <textarea id="descriptionInput" placeholder="Descreva o curso e o que os alunos vão aprender..."
                class="w-full min-h-24 bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary"></textarea>
              <p class="text-xs text-muted-foreground">A primeira frase será usada como resumo (máx. ~240 caracteres).</p>
            </div>

            <div class="grid md:grid-cols-3 gap-4">
              <div class="space-y-2">
                <label for="priceInput" class="block text-sm">Preço (R$)</label>
                <input id="priceInput" type="number" placeholder="497" min="0" step="0.01"
                  class="w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />
              </div>
              <div class="space-y-2">
                <label for="durationHoursInput" class="block text-sm">Duração (horas)</label>
                <input id="durationHoursInput" type="number" placeholder="40" min="0"
                  class="w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />
                <p class="text-xs text-muted-foreground">Opcional. A duração real virá da soma das aulas.</p>
              </div>
              <div class="space-y-2">
                <label for="levelSelect" class="block text-sm">Nível</label>
                <div class="relative">
                  <select id="levelSelect"
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
                <input id="imageInput" type="file" accept="image/png,image/jpeg" class="hidden" />
                <i data-lucide="upload" class="h-8 w-8 mx-auto mb-2 text-muted-foreground"></i>
                <p class="text-sm text-muted-foreground">Clique para fazer upload ou arraste a imagem aqui</p>
                <p class="text-xs text-muted-foreground mt-1">PNG, JPG até 5MB</p>
              </label>
              <input id="thumbnailUrlInput" type="text" placeholder="Ou cole aqui uma URL pública da imagem"
                class="w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />
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
            <!-- Módulos via JS -->
          </div>
        </section>

        <!-- Actions -->
        <div class="flex gap-4">
          <a href="#" id="publishBtn"
            class="inline-flex items-center justify-center rounded-2xl px-5 py-3 bg-primary text-white hover:bg-primary/90 transition text-lg">
            Publicar Curso
          </a>
          <a href="#" id="draftBtn"
            class="inline-flex items-center justify-center rounded-2xl px-5 py-3 border border-border/60 hover:bg-white/5 transition text-lg">
            Salvar Rascunho
          </a>
        </div>
      </div>
    </div>
  </div>

  <script src="./public/src/js/tailwind.config.js"></script>

  <script src="./public/src/js/ui.js?v=<?php echo time() ?>"></script>
  <script src="./public/src/js/main.js"></script>

</body>

</html>