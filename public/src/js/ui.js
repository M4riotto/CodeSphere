// public/js/ui.js
document.addEventListener('DOMContentLoaded', () => {
  // Inicializa ícones Lucide
  if (window.lucide?.createIcons) {
    window.lucide.createIcons();
  }

  // Toggle de menu mobile (se desejar evoluir depois)
  const menuBtn = document.getElementById('menuBtn');
  const mobileNav = document.getElementById('mobileNav');
  if (menuBtn && mobileNav) {
    menuBtn.addEventListener('click', () => {
      mobileNav.classList.toggle('hidden');
    });
  }

  // Tabs simples
  const tabButtons = document.querySelectorAll('.tab-btn');
  const contents = document.querySelectorAll('[data-content]');
  tabButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const key = btn.getAttribute('data-tab');

      // ativa botão
      tabButtons.forEach(b => b.classList.remove('tab-active'));
      btn.classList.add('tab-active');

      // alterna conteúdo
      contents.forEach(sec => {
        sec.classList.toggle('hidden', sec.getAttribute('data-content') !== key);
      });
    });
  });

});


