<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acesso Negado | 403</title>

  <!-- Tailwind via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind = window.tailwind || {};
    tailwind.config = {
      theme: {
        container: {
          center: true,
          padding: {
            DEFAULT: "1rem",
            lg: "2rem"
          }
        },
        extend: {
          fontFamily: {
            sans: ['Maven Pro', 'ui-sans-serif', 'system-ui']
          },
          colors: {
            background: '#182131ff',
            foreground: '#f5f5f5',
            border: '#2d3748',
            primary: {
              DEFAULT: '#ff7b00',
              foreground: '#ffffff',
              50: '#fff4e6',
              100: '#ffe8cc',
              200: '#ffd199',
              300: '#ffb866',
              400: '#ff9e33',
              500: '#ff7b00',
              600: '#e66f00',
              700: '#b85800',
              800: '#8a4200',
              900: '#5c2c00',
              950: '#331900'
            },
            secondary: {
              DEFAULT: '#007bff',
              foreground: '#ffffff',
              50: '#e6f2ff',
              100: '#cce5ff',
              200: '#99ccff',
              300: '#66b3ff',
              400: '#3399ff',
              500: '#007bff',
              600: '#0066cc',
              700: '#0052a3',
              800: '#003d7a',
              900: '#002952',
              950: '#001426'
            },
            muted: {
              DEFAULT: '#a0a0a0',
              foreground: '#d4d4d4'
            },
            card: { DEFAULT: 'rgba(16, 16, 33, 0)' },
            ringline: 'rgba(255,255,255,0.08)',
            success: '#00C851',
            warn: '#ffbb33',
            error: '#ff4444'
          },
          borderRadius: {
            '2xl': '1rem',
            '3xl': '1.25rem'
          },
          boxShadow: {
            premium: '0 12px 40px -10px rgba(0,0,0,0.6)'
          },
          backdropBlur: {
            xs: '2px'
          }
        }
      }
    };
  </script>
</head>

<body class="bg-background text-foreground font-sans min-h-screen flex items-center justify-center">

  <main class="text-center space-y-8 p-6">
    <div>
      <h1 class="text-9xl font-bold text-primary animate-pulse">403</h1>
      <h2 class="text-3xl font-semibold mt-2">Acesso Negado</h2>
      <p class="text-muted mt-2 text-lg">Você não tem permissão para acessar esta página.</p>
    </div>

    <div class="flex justify-center mt-6">
      <a href="./index" 
         class="bg-primary hover:bg-primary-600 text-primary-foreground px-6 py-3 rounded-2xl text-lg font-medium shadow-premium transition-all">
        Voltar à Página Inicial
      </a>
    </div>
  </main>

</body>
</html>
