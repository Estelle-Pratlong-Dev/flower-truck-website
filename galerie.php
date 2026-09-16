<?php
require __DIR__ . '/inc/photos.php';

$navActuel = 'galerie';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La galerie — Manalex Flowers Truck</title>
  <meta name="description" content="Toutes les créations florales de Manalex Flowers Truck : bouquets de saison, compositions, plantes et créations faites avec passion en Cévennes.">
  <link rel="canonical" href="https://manalex-flowerstruck.fr/galerie.php">

  <!-- Aperçu lors du partage sur les réseaux (Facebook, Instagram, WhatsApp…) -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="fr_FR">
  <meta property="og:site_name" content="Manalex Flowers Truck">
  <meta property="og:title" content="La galerie — Manalex Flowers Truck">
  <meta property="og:description" content="Toutes les créations florales de Manalex Flowers Truck : bouquets, compositions et plantes faites avec passion en Cévennes.">
  <meta property="og:url" content="https://manalex-flowerstruck.fr/galerie.php">
  <meta property="og:image" content="https://manalex-flowerstruck.fr/images/camion.jpg">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="stylesheet" href="css/style.css?v=<?= filemtime(__DIR__ . '/css/style.css') ?>">
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
            <img src="images/galerie/<?= rawurlencode($p) ?>" alt="<?= htmlspecialchars(descriptionPhoto($descriptions, $p)) ?>" loading="lazy">
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
    <img id="lightboxImg" src="" alt="Création florale Manalex Flowers Truck en grand">
  </div>

  <?php include __DIR__ . '/inc/footer.php'; ?>

  <script src="js/main.js"></script>
  <script src="js/galerie.js"></script>
</body>
</html>
