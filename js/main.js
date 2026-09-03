// Menu mobile (burger) — commun à toutes les pages
const burger = document.getElementById('burger');
const navLinks = document.getElementById('navLinks');
burger.addEventListener('click', () => {
  const open = navLinks.classList.toggle('is-open');
  burger.setAttribute('aria-expanded', open);
});
navLinks.querySelectorAll('a').forEach(a =>
  a.addEventListener('click', () => navLinks.classList.remove('is-open'))
);

// Photos manquantes : affiche un espace réservé plutôt qu'une icône cassée
document.querySelectorAll('img[data-fallback]').forEach(img => {
  img.addEventListener('error', () => {
    const ph = document.createElement('div');
    ph.className = 'placeholder';
    ph.innerHTML = '<span>' + img.dataset.fallback + '</span><small>Photo à venir</small>';
    img.replaceWith(ph);
  });
});

// Apparition douce au défilement : cible tout élément marqué .reveal dans le HTML
const observer = new IntersectionObserver(entries => {
  entries.forEach(e => e.isIntersecting && e.target.classList.add('is-visible'));
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
