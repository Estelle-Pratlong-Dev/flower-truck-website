// Visionneuse plein écran — propre à la page galerie
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightboxImg');
document.querySelectorAll('.gallery__zoom').forEach(btn => {
  btn.addEventListener('click', () => {
    lightboxImg.src = btn.querySelector('img').src;
    lightbox.hidden = false;
    document.body.style.overflow = 'hidden';
  });
});
function fermer() {
  lightbox.hidden = true;
  document.body.style.overflow = '';
}
lightbox.addEventListener('click', fermer);
document.getElementById('lightboxClose').addEventListener('click', fermer);
document.addEventListener('keydown', e => { if (e.key === 'Escape') fermer(); });
