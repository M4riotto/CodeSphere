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
            // Fundo escuro moderno com contraste suave
            background: '#182131ff', // Azul petróleo quase preto
            foreground: '#f5f5f5', // Branco suave
            border: '#2d3748',     // Azul acinzentado escuro

            // Marca / Primária (laranja vibrante)
            primary: {
              DEFAULT: '#ff7b00',  // Laranja vivo
              foreground: '#ffffff',
              50:  '#fff4e6',
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

            // Secundário (azul real)
            secondary: {
              DEFAULT: '#007bff', // Azul forte
              foreground: '#ffffff',
              50:  '#e6f2ff',
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

            // Tons auxiliares
            muted: {
              DEFAULT: '#a0a0a0',
              foreground: '#d4d4d4'
            },
            card: {
              DEFAULT: 'rgba(16, 16, 33, 0)'
            },
            ringline: 'rgba(255,255,255,0.08)',

            // Cores de estado
            success: '#00C851',  // Verde sucesso
            warn:   '#ffbb33',   // Amarelo alerta
            error:  '#ff4444'    // Vermelho erro
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