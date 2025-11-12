<?php
require_once __DIR__ . '/../../app/middlewares/auth_guard.php';
require_auth_or_403();
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Perfil • EliteLearn</title>

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

    .gradient-primary {
      background-image: linear-gradient(135deg, #ff7b00, #ff9e33);
    }

    .shadow-premium {
      box-shadow: 0 12px 40px -10px rgba(0, 0, 0, 0.6);
    }

    .transition-smooth {
      transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .tab-active {
      background-color: rgba(255, 255, 255, .06);
      border-color: rgba(255, 255, 255, .18);
    }

    .badge-outline {
      border: 1px solid #ffb600;
      color: #ffb600;
    }
  </style>
</head>

<body class="bg-background text-foreground antialiased">

  <?php require_once '../components/header.php' ?>
  <!-- Profile -->
  <div class="min-h-screen pb-12">
    <div class="container mx-auto px-4 lg:px-8 pt-24">
      <div class="grid lg:grid-cols-3 gap-8">
        <!-- Sidebar -->
        <aside class="lg:col-span-1">
          <section class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur mb-6">
            <div class="p-6 text-center">
              <!-- Avatar -->
              <div
                class="w-24 h-24 mx-auto mb-4 rounded-full gradient-primary shadow-premium flex items-center justify-center">
                <span class="text-2xl font-bold">JS</span>
              </div>
              <h2 class="text-2xl font-bold mb-1">João Silva</h2>
              <p class="text-sm text-muted-foreground mb-4">joao.silva@email.com</p>
              <span
                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold gradient-gold text-black border-0 mb-4">Membro
                Premium</span>

              <div class="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-border/50">
                <div>
                  <div class="text-2xl font-bold gradient-gold bg-clip-text text-transparent">5</div>
                  <div class="text-xs text-muted-foreground">Cursos</div>
                </div>
                <div>
                  <div class="text-2xl font-bold gradient-gold bg-clip-text text-transparent">3</div>
                  <div class="text-xs text-muted-foreground">Certificados</div>
                </div>
                <div>
                  <div class="text-2xl font-bold gradient-gold bg-clip-text text-transparent">127h</div>
                  <div class="text-xs text-muted-foreground">Estudo</div>
                </div>
              </div>

              <a href="#editar"
                class="inline-flex items-center justify-center w-full mt-6 rounded-2xl px-4 py-2 border border-border/60 hover:bg-white/5 transition">
                <i data-lucide="user" class="mr-2 h-4 w-4"></i>
                Editar Perfil
              </a>
            </div>
          </section>

          <!-- Conquistas -->
          <section class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
            <div class="px-6 pt-6">
              <h3 class="text-lg font-semibold">Conquistas</h3>
            </div>
            <div class="p-6 space-y-4">
              <!-- item 1 -->
              <div class="flex items-center gap-3">
                <div class="p-2 rounded-lg gradient-primary shadow-premium">
                  <i data-lucide="trophy" class="h-5 w-5 text-white"></i>
                </div>
                <div>
                  <p class="font-semibold text-sm">Primeira Conquista</p>
                  <p class="text-xs text-muted-foreground">Completou o primeiro curso</p>
                </div>
              </div>
              <!-- item 2 -->
              <div class="flex items-center gap-3">
                <div class="p-2 rounded-lg gradient-primary shadow-premium">
                  <i data-lucide="award" class="h-5 w-5 text-white"></i>
                </div>
                <div>
                  <p class="font-semibold text-sm">Dedicado</p>
                  <p class="text-xs text-muted-foreground">7 dias seguidos de estudo</p>
                </div>
              </div>
              <!-- item 3 -->
              <div class="flex items-center gap-3">
                <div class="p-2 rounded-lg gradient-primary shadow-premium">
                  <i data-lucide="book-open" class="h-5 w-5 text-white"></i>
                </div>
                <div>
                  <p class="font-semibold text-sm">Conhecimento</p>
                  <p class="text-xs text-muted-foreground">Completou 3 cursos</p>
                </div>
              </div>
            </div>
          </section>
        </aside>

        <!-- Main -->
        <main class="lg:col-span-2">
          <!-- Tabs -->
          <div class="w-full">
            <!-- TabsList -->
            <div class="w-full flex flex-wrap gap-2 mb-6 border border-border/40 rounded-2xl p-1">
              <button data-tab="certificates"
                class="tab-btn px-4 py-2 rounded-2xl text-sm flex items-center gap-2 tab-active">
                <i data-lucide="award" class="h-4 w-4"></i>
                Certificados
              </button>
              <button data-tab="courses" class="tab-btn px-4 py-2 rounded-2xl text-sm flex items-center gap-2">
                <i data-lucide="book-open" class="h-4 w-4"></i>
                Meus Cursos
              </button>
            </div>

            <!-- TabsContent: Certificates -->
            <section data-content="certificates" class="space-y-4">
              <!-- cert 1 -->
              <div
                class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur overflow-hidden group hover:shadow-premium transition-smooth">
                <div class="flex flex-col md:flex-row">
                  <div class="md:w-48 h-auto gradient-primary flex items-center justify-center">
                    <i data-lucide="award" class="h-16 w-16 text-white"></i>
                  </div>
                  <div class="flex-1 p-6">
                    <div class="flex items-start justify-between mb-2">
                      <div>
                        <h3 class="text-xl font-bold mb-1">Marketing Digital Completo</h3>
                        <p class="text-sm text-muted-foreground">Instrutor: Profa. Ana Costa</p>
                      </div>
                      <span
                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold badge-outline">40h</span>
                    </div>
                    <p class="text-sm text-muted-foreground mb-4">Concluído em 15/01/2024</p>
                    <a href="#download"
                      class="inline-flex items-center rounded-2xl px-3 py-2 border border-border/60 hover:bg-white/5 text-sm transition">
                      <i data-lucide="download" class="mr-2 h-4 w-4"></i>
                      Baixar Certificado
                    </a>
                  </div>
                </div>
              </div>

              <!-- cert 2 -->
              <div
                class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur overflow-hidden group hover:shadow-premium transition-smooth">
                <div class="flex flex-col md:flex-row">
                  <div class="md:w-48 h-auto gradient-primary flex items-center justify-center">
                    <i data-lucide="award" class="h-16 w-16 text-white"></i>
                  </div>
                  <div class="flex-1 p-6">
                    <div class="flex items-start justify-between mb-2">
                      <div>
                        <h3 class="text-xl font-bold mb-1">Excel Avançado para Negócios</h3>
                        <p class="text-sm text-muted-foreground">Instrutor: Prof. Roberto Lima</p>
                      </div>
                      <span
                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold badge-outline">30h</span>
                    </div>
                    <p class="text-sm text-muted-foreground mb-4">Concluído em 20/12/2023</p>
                    <a href="#download"
                      class="inline-flex items-center rounded-2xl px-3 py-2 border border-border/60 hover:bg-white/5 text-sm transition">
                      <i data-lucide="download" class="mr-2 h-4 w-4"></i>
                      Baixar Certificado
                    </a>
                  </div>
                </div>
              </div>

              <!-- cert 3 -->
              <div
                class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur overflow-hidden group hover:shadow-premium transition-smooth">
                <div class="flex flex-col md:flex-row">
                  <div class="md:w-48 h-auto gradient-primary flex items-center justify-center">
                    <i data-lucide="award" class="h-16 w-16 text-white"></i>
                  </div>
                  <div class="flex-1 p-6">
                    <div class="flex items-start justify-between mb-2">
                      <div>
                        <h3 class="text-xl font-bold mb-1">Gestão de Projetos Ágil</h3>
                        <p class="text-sm text-muted-foreground">Instrutor: Dr. Paulo Santos</p>
                      </div>
                      <span
                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold badge-outline">35h</span>
                    </div>
                    <p class="text-sm text-muted-foreground mb-4">Concluído em 10/11/2023</p>
                    <a href="#download"
                      class="inline-flex items-center rounded-2xl px-3 py-2 border border-border/60 hover:bg-white/5 text-sm transition">
                      <i data-lucide="download" class="mr-2 h-4 w-4"></i>
                      Baixar Certificado
                    </a>
                  </div>
                </div>
              </div>
            </section>

            <!-- TabsContent: Courses -->
            <section data-content="courses" class="space-y-4 hidden">
              <!-- course 1 -->
              <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
                <div class="p-6">
                  <div class="flex items-center justify-between mb-4">
                    <div>
                      <h3 class="text-lg font-bold mb-1">Gestão Empresarial Avançada</h3>
                      <span
                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold gradient-gold text-black border-0">Em
                        andamento</span>
                    </div>
                    <span class="text-xl font-bold gradient-gold bg-clip-text text-transparent">65%</span>
                  </div>
                  <div class="h-2 bg-secondary rounded-full overflow-hidden mb-4">
                    <div class="h-full gradient-primary transition-all" style="width:65%"></div>
                  </div>
                  <a href="./courseDetail"
                    class="inline-flex items-center rounded-2xl px-4 py-2 bg-primary text-white hover:bg-primary/90 transition text-sm">
                    Continuar Estudando
                  </a>
                </div>
              </div>

              <!-- course 2 -->
              <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
                <div class="p-6">
                  <div class="flex items-center justify-between mb-4">
                    <div>
                      <h3 class="text-lg font-bold mb-1">Desenvolvimento Full Stack Elite</h3>
                      <span
                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold gradient-gold text-black border-0">Em
                        andamento</span>
                    </div>
                    <span class="text-xl font-bold gradient-gold bg-clip-text text-transparent">40%</span>
                  </div>
                  <div class="h-2 bg-secondary rounded-full overflow-hidden mb-4">
                    <div class="h-full gradient-primary transition-all" style="width:40%"></div>
                  </div>
                  <a href="./courseDetail"
                    class="inline-flex items-center rounded-2xl px-4 py-2 bg-primary text-white hover:bg-primary/90 transition text-sm">
                    Continuar Estudando
                  </a>
                </div>
              </div>

              <!-- course 3 -->
              <div class="rounded-2xl border border-border/50 bg-card/50 backdrop-blur">
                <div class="p-6">
                  <div class="flex items-center justify-between mb-4">
                    <div>
                      <h3 class="text-lg font-bold mb-1">Marketing Digital Completo</h3>
                      <span
                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold badge-outline">Concluído</span>
                    </div>
                    <span class="text-xl font-bold gradient-gold bg-clip-text text-transparent">100%</span>
                  </div>
                  <div class="h-2 bg-secondary rounded-full overflow-hidden mb-4">
                    <div class="h-full gradient-primary transition-all" style="width:100%"></div>
                  </div>
                  <a href="./courseDetail"
                    class="inline-flex items-center rounded-2xl px-4 py-2 bg-primary text-white hover:bg-primary/90 transition text-sm">
                    Revisar Curso
                  </a>
                </div>
              </div>
            </section>
          </div>
        </main>
      </div>
    </div>
  </div>

  <script src="./public/src/js/tailwind.config.js"></script>
  <script src="./public/src/js/ui.js?v=<?php echo time()?>"></script>
</body>

</html>