<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Curso • Gestão Empresarial Avançada</title>

  <!-- Fonte coerente com seu config -->
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

  <!-- Course Detail -->
  <div class="min-h-screen pb-12">
    <div class="container mx-auto px-4 lg:px-8 pt-24">
      <div class="grid lg:grid-cols-3 gap-8">

        <!-- Main Content -->
        <div class="lg:col-span-2">

          <!-- Course Header -->
          <div class="mb-8">
            <span
              id="badge-category"
              class="inline-flex items-center mb-4 px-3 py-1 rounded-full gradient-gold text-black text-xs font-semibold border-0">
              Categoria
            </span>

            <h1 id="title" class="text-4xl font-bold mb-4">Título do Curso</h1>
            <p id="description" class="text-lg text-muted-foreground mb-6">
              Resumo ou descrição breve do curso.
            </p>

            <div class="flex flex-wrap gap-6 text-sm">
              <div class="flex items-center gap-2">
                <i data-lucide="clock" class="h-4 w-4 text-primary"></i>
                <span id="duration">0h de conteúdo</span>
              </div>
              <div class="flex items-center gap-2">
                <i data-lucide="users" class="h-4 w-4 text-primary"></i>
                <span id="students">0 alunos</span>
              </div>
              <div class="flex items-center gap-2">
                <i data-lucide="star" class="h-4 w-4 text-[#ffb600] fill-[#ffb600]"></i>
                <span id="rating">0.0 avaliação</span>
              </div>
              <div class="flex items-center gap-2">
                <i data-lucide="award" class="h-4 w-4 text-secondary"></i>
                <span>Certificado incluso</span>
              </div>
            </div>
          </div>

          <!-- Course Image -->
          <div class="relative rounded-xl overflow-hidden mb-8 shadow-premium">
            <img id="thumbnail" src="./public/src/assets/course-business.jpg" alt="Imagem do Curso"
              class="w-full h-80 object-cover">
            <div class="absolute inset-0 flex items-center justify-center bg-background/40 backdrop-blur-sm">
              <i data-lucide="play-circle"
                class="h-20 w-20 text-primary cursor-pointer transition-smooth hover:scale-110"></i>
            </div>
          </div>

          <!-- Modules (Accordion) -->
          <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
            <div class="px-6 pt-6">
              <h2 class="text-xl font-semibold">Conteúdo do Curso</h2>
            </div>
            <div class="p-6">
              <div id="accordion" class="w-full">
                <!-- Módulos serão renderizados via JS -->
              </div>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
          <div id="card"
            class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur sticky top-24">
            <div class="p-6">
              <div class="text-center mb-6">
                <div id="price" class="text-4xl font-bold gradient-gold bg-clip-text text-transparent mb-2">
                  R$ 0,00
                </div>
                <p id="price-note" class="text-sm text-muted-foreground">Acesso vitalício</p>
              </div>

              <a href="#comprar"
                class="w-full mb-3 inline-flex items-center justify-center rounded-2xl px-5 py-3 bg-primary text-white hover:bg-primary/90 transition text-base">
                Comprar Agora
              </a>
              <a href="#carrinho"
                class="w-full mb-6 inline-flex items-center justify-center rounded-2xl px-5 py-3 border border-border/50 hover:bg-white/5 transition text-base">
                Adicionar ao Carrinho
              </a>

              <div class="space-y-4 text-sm">
                <div class="flex items-center gap-3">
                  <i data-lucide="award" class="h-5 w-5 text-secondary"></i>
                  <span>Certificado de conclusão</span>
                </div>
                <div class="flex items-center gap-3">
                  <i data-lucide="clock" class="h-5 w-5 text-primary"></i>
                  <span>Acesso vitalício</span>
                </div>
                <div class="flex items-center gap-3">
                  <i data-lucide="play-circle" class="h-5 w-5 text-primary"></i>
                  <span id="qtdClass">32 aulas em vídeo</span>
                </div>
                <div class="flex items-center gap-3">
                  <i data-lucide="file-text" class="h-5 w-5 text-secondary"></i>
                  <span>Materiais complementares</span>
                </div>
              </div>

              <div class="mt-6 pt-6 border-t border-border/50">
                <p class="text-xs text-muted-foreground text-center">
                  Garantia de 30 dias ou seu dinheiro de volta
                </p>
              </div>
            </div>
          </div>

          <!-- Instructor -->
          <div id="resume_instructor"
            class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur mt-6">
            <div class="px-6 pt-6">
              <h3 class="text-lg font-semibold">Instrutor</h3>
            </div>
            <div class="p-6">
              <p id="instructor-name" class="font-semibold mb-1">Nome do Instrutor</p>
              <p id="instructor-bio" class="text-sm text-muted-foreground">
                Resumo do instrutor ou biografia breve.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  <script src="./public/src/js/tailwind.config.js"></script>
  <script src="./public/src/js/ui.js?v=<?php echo time()?>"></script>
  <script src="./public/src/js/main.js?v<?php echo time() ?>"></script>
  <script>
    // Accordion simples (collapsible single)
    const acc = document.getElementById('accordion');
    let openKey = null;
    acc?.querySelectorAll('[data-acc]').forEach(btn => {
      btn.addEventListener('click', () => {
        const key = btn.getAttribute('data-acc');
        const panel = acc.querySelector(`[data-acc-panel="${key}"]`);
        const icon = acc.querySelector(`[data-acc-icon="${key}"]`);

        // fecha o anterior
        if (openKey && openKey !== key) {
          const prevPanel = acc.querySelector(`[data-acc-panel="${openKey}"]`);
          const prevIcon = acc.querySelector(`[data-acc-icon="${openKey}"]`);
          prevPanel?.classList.add('hidden');
          prevIcon?.classList.remove('rotate-180');
        }

        // toggle atual
        panel?.classList.toggle('hidden');
        icon?.classList.toggle('rotate-180');
        openKey = panel?.classList.contains('hidden') ? null : key;
      });
    });
  </script>
</body>

</html>