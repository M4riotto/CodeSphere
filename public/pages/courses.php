<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Explore Nossos Cursos</title>

  <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    .text-muted-foreground { color:#d4d4d4; }
    .gradient-gold { background-image: linear-gradient(135deg, #ffb600, #ffcf66); }
    .shadow-premium { box-shadow: 0 12px 40px -10px rgba(0,0,0,.6); }
  </style>
</head>
<body class="bg-background text-foreground antialiased" onload="fetchCourses();">

  <?php require_once '../components/header.php' ?>

  <div class="min-h-screen pb-12">
    <div class="container mx-auto px-4 lg:px-8 pt-24 max-w-7xl">

      <div class="mb-8">
        <h1 class="text-4xl font-bold mb-2">
          Explore Nossos <span class="gradient-gold bg-clip-text text-transparent">Cursos</span>
        </h1>
        <p class="text-muted-foreground">Encontre o curso perfeito para sua jornada</p>
      </div>

      <!-- Search + Filter -->
      <div class="flex flex-col md:flex-row gap-4 mb-8">
        <div class="flex-1 relative">
          <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground"></i>
          <input id="searchInput" type="text" placeholder="Buscar cursos..."
                 class="w-full pl-10 pr-3 py-2 rounded-2xl bg-card/50 border border-border/50 outline-none focus:ring-2 focus:ring-primary"/>
        </div>
        <div class="md:w-64">
          <div class="relative">
            <select id="categorySelect"
                    class="appearance-none w-full bg-card/50 rounded-2xl border border-border/60 px-3 py-2 pr-8 outline-none focus:ring-2 focus:ring-primary">
              <option value="">Todas categorias</option>
              <option value="1">Negócios</option>
              <option value="2">Tecnologia</option>
              <option value="3">Design</option>
              <option value="4">Marketing</option>
            </select>
            <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 opacity-70"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="m6 9 6 6 6-6"/>
            </svg>
          </div>
        </div>
      </div>

      <!-- Grid -->
      <div id="coursesGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6"></div>

      <!-- Empty state -->
      <div id="emptyState" class="hidden text-center py-16">
        <i data-lucide="search-x" class="h-10 w-10 mx-auto mb-3 opacity-80"></i>
        <p class="text-muted-foreground">Nenhum curso encontrado.</p>
      </div>

    </div>
  </div>

  <script src="./public/src/js/tailwind.config.js"></script>
  <script src="./public/src/js/main.js"></script>
  <script src="./public/src/js/ui.js?v=<?php echo time()?>"></script>

</body>
</html>
