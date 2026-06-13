<?php
// Toutes les photos du dossier images/galerie/ sont affichées
// automatiquement, des plus récentes aux plus anciennes.
$dossierGalerie = __DIR__ . '/images/galerie';
$photos = array_values(array_filter(scandir($dossierGalerie), function ($f) {
  return preg_match('/\.(jpe?g|png|webp)$/i', $f);
}));
usort($photos, function ($a, $b) use ($dossierGalerie) {
  return filemtime("$dossierGalerie/$b") <=> filemtime("$dossierGalerie/$a")
    ?: strnatcasecmp($a, $b);
});
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La galerie — Manalex Fleurs | Flowers Truck</title>
  <meta name="description" content="Toutes les créations florales de Manalex Fleurs : bouquets de saison, compositions, plantes et créations faites avec passion en Cévennes.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌸</text></svg>">
</head>
<body>

  <!-- ===== Navigation ===== -->
  <header class="nav" id="top">
    <a class="nav__brand" href="index.php">
      <span class="nav__logo">Manalex Fleurs</span>
    </a>
    <nav class="nav__links" id="navLinks">
      <a href="index.php#concept">Le concept</a>
      <a href="index.php#planning">Où me retrouver</a>
      <a href="galerie.php" class="is-active">Mes créations</a>
      <a href="index.php#contact">Contact</a>
    </nav>
    <button class="nav__burger" id="burger" aria-label="Ouvrir le menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </header>

  <!-- ===== En-tête de page ===== -->
  <section class="page-hero">
    <p class="section__kicker section__kicker--center">La galerie</p>
    <h1 class="section__title section__title--center">Toutes mes créations</h1>
    <p class="page-hero__intro">Bouquets, compositions et créations du moment — cliquez sur une photo pour l'agrandir&nbsp;🌸</p>
  </section>

  <!-- ===== Galerie complète ===== -->
  <section class="section galerie-page">
    <div class="section__inner">
      <?php if (count($photos) === 0): ?>
      <p class="galerie-page__vide">Les photos arrivent bientôt… revenez vite&nbsp;! 🌷</p>
      <?php else: ?>
      <div class="gallery gallery--page">
        <?php foreach ($photos as $p): ?>
        <figure>
          <button class="gallery__zoom" type="button" aria-label="Agrandir la photo">
            <img src="images/galerie/<?= rawurlencode($p) ?>" alt="Création florale Manalex Fleurs" loading="lazy">
          </button>
        </figure>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
      <div class="creations__more">
        <a class="btn btn--primary" href="index.php#planning">🌼 Où me retrouver cette semaine&nbsp;?</a>
      </div>
    </div>
  </section>

  <!-- ===== Visionneuse ===== -->
  <div class="lightbox" id="lightbox" hidden>
    <button class="lightbox__close" id="lightboxClose" aria-label="Fermer">✕</button>
    <img id="lightboxImg" src="" alt="Création florale Manalex Fleurs en grand">
  </div>

  <!-- ===== Footer ===== -->
  <footer class="footer" id="contact">
    <div class="section__inner footer__grid">
      <div>
        <p class="footer__logo">Manalex Fleurs</p>
        <p class="footer__sub">— Flowers Truck —</p>
        <p class="footer__tag">Au plaisir de vous y retrouver&nbsp;!&nbsp;♡</p>
      </div>
      <div>
        <h3>Contact</h3>
        <ul class="footer__list">
          <li>📞 <a href="tel:+33622581230">06 22 58 12 30</a></li>
          <li>✉️ <a href="mailto:manalex.flowerstruck@gmail.com">manalex.flowerstruck@gmail.com</a></li>
          <li>📍 Cévennes — Gard (30)</li>
        </ul>
      </div>
      <div>
        <h3>Suivez-moi</h3>
        <ul class="footer__list">
          <li>📘 <a href="https://www.facebook.com/profile.php?id=61587362490442" target="_blank" rel="noopener">Facebook — Manalex Fleurs</a></li>
          <li>📸 <a href="https://www.instagram.com/manalex.flowerstruck" target="_blank" rel="noopener">Instagram — @manalex.flowerstruck</a></li>
          <!-- Page Google Entreprise : décommenter et coller le lien quand elle sera créée
          <li>⭐ <a href="LIEN_GOOGLE" target="_blank" rel="noopener">Laissez un avis Google</a></li>
          -->
        </ul>
      </div>
    </div>
    <p class="footer__bottom">🌿 Soutenons le local — merci&nbsp;! 🌿<br><small>© 2026 Manalex Fleurs · Flowers Truck</small></p>
  </footer>

  <script>
    // Menu mobile
    const burger = document.getElementById('burger');
    const navLinks = document.getElementById('navLinks');
    burger.addEventListener('click', () => {
      const open = navLinks.classList.toggle('is-open');
      burger.setAttribute('aria-expanded', open);
    });

    // Visionneuse plein écran
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

    // Apparition douce
    const observer = new IntersectionObserver(entries => {
      entries.forEach(e => e.isIntersecting && e.target.classList.add('is-visible'));
    }, { threshold: 0.08 });
    document.querySelectorAll('.gallery figure').forEach(el => {
      el.classList.add('reveal');
      observer.observe(el);
    });
  </script>
</body>
</html>
