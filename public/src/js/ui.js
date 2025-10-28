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
});
