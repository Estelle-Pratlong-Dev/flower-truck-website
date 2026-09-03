<?php
require __DIR__ . '/inc/photos.php';

$navActuel = 'galerie';
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

  <?php include __DIR__ . '/inc/nav.php'; ?>

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
      <p class="etat-vide">Les photos arrivent bientôt… revenez vite&nbsp;! 🌷</p>
      <?php else: ?>
      <div class="gallery gallery--page">
        <?php foreach ($photos as $p): ?>
        <figure class="reveal">
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

  <?php include __DIR__ . '/inc/footer.php'; ?>

  <script src="js/main.js"></script>
  <script src="js/galerie.js"></script>
</body>
</html>
