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
            <!-- <Badge className="mb-4 gradient-gold border-0">{course.category}</Badge> -->
            <span
              class="inline-flex items-center mb-4 px-3 py-1 rounded-full gradient-gold text-black text-xs font-semibold border-0">Negócios</span>

            <h1 class="text-4xl font-bold mb-4">Gestão Empresarial Avançada</h1>
            <p class="text-lg text-muted-foreground mb-6">
              Domine estratégias de gestão e liderança para transformar sua carreira executiva com este curso completo e
              prático.
            </p>

            <div class="flex flex-wrap gap-6 text-sm">
              <div class="flex items-center gap-2">
                <i data-lucide="clock" class="h-4 w-4 text-primary"></i>
                <span>40h de conteúdo</span>
              </div>
              <div class="flex items-center gap-2">
                <i data-lucide="users" class="h-4 w-4 text-primary"></i>
                <span>2400 alunos</span>
              </div>
              <div class="flex items-center gap-2">
                <i data-lucide="star" class="h-4 w-4 text-[#ffb600] fill-[#ffb600]"></i>
                <span>4.9 avaliação</span>
              </div>
              <div class="flex items-center gap-2">
                <i data-lucide="award" class="h-4 w-4 text-secondary"></i>
                <span>Certificado incluso</span>
              </div>
            </div>
          </div>

          <!-- Course Image -->
          <div class="relative rounded-xl overflow-hidden mb-8 shadow-premium">
            <img src="./public/src/assets/course-business.jpg" alt="Gestão Empresarial Avançada"
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
              <div class="w-full" id="accordion">
                <!-- Módulo 1 -->
                <div class="border-b border-border/50">
                  <button class="w-full flex items-center justify-between py-4 hover:text-primary" data-acc="m1">
                    <span class="font-semibold text-left">Módulo 1: Fundamentos da Gestão</span>
                    <svg class="h-5 w-5 transition-transform" data-acc-icon="m1" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor">
                      <path d="m6 9 6 6 6-6" />
                    </svg>
                  </button>
                  <div class="hidden pb-5 space-y-2" data-acc-panel="m1">
                    <!-- lições -->
                    <a href="/courses/1/lesson/1"
                      class="flex items-center justify-between p-3 rounded-lg hover:bg-primary/10 transition-smooth">
                      <div class="flex items-center gap-3">
                        <i data-lucide="play-circle" class="h-4 w-4 text-primary"></i>
                        <span class="text-sm">Introdução à Gestão Moderna</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">15min</span>
                      </div>
                    </a>
                    <a href="/courses/1/lesson/2"
                      class="flex items-center justify-between p-3 rounded-lg hover:bg-primary/10 transition-smooth">
                      <div class="flex items-center gap-3">
                        <i data-lucide="play-circle" class="h-4 w-4 text-primary"></i>
                        <span class="text-sm">Princípios de Liderança</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">20min</span>
                      </div>
                    </a>
                    <a href="/courses/1/lesson/3"
                      class="flex items-center justify-between p-3 rounded-lg hover:bg-primary/10 transition-smooth">
                      <div class="flex items-center gap-3">
                        <i data-lucide="file-text" class="h-4 w-4 text-secondary"></i>
                        <span class="text-sm">Exercício Prático</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">30min</span>
                      </div>
                    </a>
                  </div>
                </div>

                <!-- Módulo 2 -->
                <div class="border-b border-border/50">
                  <button class="w-full flex items-center justify-between py-4 hover:text-primary" data-acc="m2">
                    <span class="font-semibold text-left">Módulo 2: Estratégia Empresarial</span>
                    <svg class="h-5 w-5 transition-transform" data-acc-icon="m2" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor">
                      <path d="m6 9 6 6 6-6" />
                    </svg>
                  </button>
                  <div class="hidden pb-5 space-y-2" data-acc-panel="m2">
                    <a href="/courses/1/lesson/4"
                      class="flex items-center justify-between p-3 rounded-lg hover:bg-primary/10 transition-smooth">
                      <div class="flex items-center gap-3">
                        <i data-lucide="play-circle" class="h-4 w-4 text-primary"></i>
                        <span class="text-sm">Análise SWOT</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">25min</span>
                      </div>
                    </a>
                    <a href="#"
                      class="flex items-center justify-between p-3 rounded-lg opacity-50 cursor-not-allowed transition-smooth">
                      <div class="flex items-center gap-3">
                        <i data-lucide="play-circle" class="h-4 w-4 text-primary"></i>
                        <span class="text-sm">Planejamento Estratégico</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">30min</span>
                        <i data-lucide="lock" class="h-3 w-3"></i>
                      </div>
                    </a>
                    <a href="#"
                      class="flex items-center justify-between p-3 rounded-lg opacity-50 cursor-not-allowed transition-smooth">
                      <div class="flex items-center gap-3">
                        <i data-lucide="file-text" class="h-4 w-4 text-secondary"></i>
                        <span class="text-sm">Estudo de Caso</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">45min</span>
                        <i data-lucide="lock" class="h-3 w-3"></i>
                      </div>
                    </a>
                  </div>
                </div>

                <!-- Módulo 3 -->
                <div class="border-b border-border/50">
                  <button class="w-full flex items-center justify-between py-4 hover:text-primary" data-acc="m3">
                    <span class="font-semibold text-left">Módulo 3: Gestão de Pessoas</span>
                    <svg class="h-5 w-5 transition-transform" data-acc-icon="m3" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor">
                      <path d="m6 9 6 6 6-6" />
                    </svg>
                  </button>
                  <div class="hidden pb-5 space-y-2" data-acc-panel="m3">
                    <a href="#"
                      class="flex items-center justify-between p-3 rounded-lg opacity-50 cursor-not-allowed transition-smooth">
                      <div class="flex items-center gap-3">
                        <i data-lucide="play-circle" class="h-4 w-4 text-primary"></i>
                        <span class="text-sm">Motivação e Engajamento</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">20min</span>
                        <i data-lucide="lock" class="h-3 w-3"></i>
                      </div>
                    </a>
                    <a href="#"
                      class="flex items-center justify-between p-3 rounded-lg opacity-50 cursor-not-allowed transition-smooth">
                      <div class="flex items-center gap-3">
                        <i data-lucide="play-circle" class="h-4 w-4 text-primary"></i>
                        <span class="text-sm">Feedback Efetivo</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">18min</span>
                        <i data-lucide="lock" class="h-3 w-3"></i>
                      </div>
                    </a>
                    <a href="#"
                      class="flex items-center justify-between p-3 rounded-lg opacity-50 cursor-not-allowed transition-smooth">
                      <div class="flex items-center gap-3">
                        <i data-lucide="file-text" class="h-4 w-4 text-secondary"></i>
                        <span class="text-sm">Avaliação de Performance</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">40min</span>
                        <i data-lucide="lock" class="h-3 w-3"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div> <!-- /accordion -->
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
          <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur sticky top-24">
            <div class="p-6">
              <div class="text-center mb-6">
                <div class="text-4xl font-bold gradient-gold bg-clip-text text-transparent mb-2">R$ 497</div>
                <p class="text-sm text-muted-foreground">Acesso vitalício</p>
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
                  <span>32 aulas em vídeo</span>
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
          <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur mt-6">
            <div class="px-6 pt-6">
              <h3 class="text-lg font-semibold">Instrutor</h3>
            </div>
            <div class="p-6">
              <p class="font-semibold mb-1">Dr. Carlos Silva</p>
              <p class="text-sm text-muted-foreground">MBA em Harvard, 20 anos de experiência em gestão executiva</p>
            </div>
          </div>
        </div>
      </div>
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