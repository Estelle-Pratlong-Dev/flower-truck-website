<?php
require __DIR__ . '/inc/photos.php';
// Le carrousel affiche les 12 dernières ; tout est sur la page galerie
$photosCarrousel = array_slice($photos, 0, 12);

$navActuel = 'accueil';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manalex Fleurs — Flowers Truck | Fleuriste ambulante en Cévennes</title>
  <meta name="description" content="Manalex Fleurs, le flower truck qui sillonne les marchés des Cévennes : fleurs fraîches, bouquets de saison, plantes et créations florales faites avec passion. Retrouvez-moi à Gagnières, Bessèges, Molières-sur-Cèze et Bordezac !">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌸</text></svg>">
</head>
<body>

  <?php include __DIR__ . '/inc/nav.php'; ?>

  <!-- ===== Hero ===== -->
  <section class="hero">
    <div class="hero__flowers hero__flowers--left" aria-hidden="true">
      <svg viewBox="0 0 120 120"><g class="fl-sun"><circle cx="60" cy="60" r="16" fill="var(--terracotta)"/><g fill="var(--gold)"><ellipse cx="60" cy="28" rx="9" ry="20"/><ellipse cx="60" cy="92" rx="9" ry="20"/><ellipse cx="28" cy="60" rx="20" ry="9"/><ellipse cx="92" cy="60" rx="20" ry="9"/><ellipse cx="38" cy="38" rx="9" ry="18" transform="rotate(-45 38 38)"/><ellipse cx="82" cy="82" rx="9" ry="18" transform="rotate(-45 82 82)"/><ellipse cx="82" cy="38" rx="9" ry="18" transform="rotate(45 82 38)"/><ellipse cx="38" cy="82" rx="9" ry="18" transform="rotate(45 38 82)"/></g></g></svg>
    </div>
    <div class="hero__flowers hero__flowers--right" aria-hidden="true">
      <svg viewBox="0 0 120 120"><g><circle cx="60" cy="60" r="13" fill="var(--gold)"/><g fill="var(--rose)"><ellipse cx="60" cy="30" rx="11" ry="22"/><ellipse cx="60" cy="90" rx="11" ry="22"/><ellipse cx="30" cy="60" rx="22" ry="11"/><ellipse cx="90" cy="60" rx="22" ry="11"/><ellipse cx="39" cy="39" rx="10" ry="20" transform="rotate(-45 39 39)"/><ellipse cx="81" cy="81" rx="10" ry="20" transform="rotate(-45 81 81)"/><ellipse cx="81" cy="39" rx="10" ry="20" transform="rotate(45 81 39)"/><ellipse cx="39" cy="81" rx="10" ry="20" transform="rotate(45 39 81)"/></g></g></svg>
    </div>

    <p class="hero__kicker">Fleuriste ambulante &middot; Cévennes</p>
    <h1 class="hero__title">Manalex <span>Fleurs</span></h1>
    <p class="hero__subtitle">— Flowers Truck —</p>
    <p class="hero__tagline">Des fleurs, des couleurs, de la bonne humeur<br>et beaucoup de passion&nbsp;!</p>
    <div class="hero__cta">
      <a class="btn btn--primary" href="#planning">🌼 Où me retrouver cette semaine&nbsp;?</a>
      <a class="btn btn--ghost" href="#concept">Découvrir le concept</a>
    </div>
    <div class="hero__scroll" aria-hidden="true">⌄</div>
  </section>

  <!-- ===== Bandeau ===== -->
  <ul class="ribbon">
    <li>🌸 Fleurs fraîches</li>
    <li>💐 Bouquets de saison</li>
    <li>🪴 Plantes</li>
    <li>🎀 Créations florales</li>
    <li>💚 Soutenons le local</li>
  </ul>

  <!-- ===== Concept ===== -->
  <section class="section concept reveal" id="concept">
    <div class="section__inner concept__grid">
      <figure class="concept__photo">
        <img src="images/camion.jpg" alt="Le camion fleuri de Manalex Fleurs, ouvert sur un marché" data-fallback="🚚🌷">
        <figcaption>Le camion vous attend sur les marchés&nbsp;!</figcaption>
      </figure>
      <div class="concept__text">
        <p class="section__kicker">Le concept</p>
        <h2 class="section__title">Un camion, des fleurs,<br>et beaucoup d'amour</h2>
        <p>Bienvenue chez <strong>Manalex Fleurs</strong>&nbsp;! Au volant de mon flower truck, je sillonne les marchés des Cévennes pour vous proposer <strong>des fleurs fraîches, des bouquets de saison, des plantes et des créations florales</strong> faites avec passion.</p>
        <p>Venez découvrir mes créations, repartir avec un peu de couleur… et surtout passer un moment <em>convivial</em>&nbsp;!</p>
        <ul class="concept__points">
          <li><span>🌷</span> Compositions florales sur mesure</li>
          <li><span>🪴</span> Plantes et fleurs de saison</li>
          <li><span>🎁</span> Petites créations à offrir (ou à s'offrir&nbsp;!)</li>
          <li><span>🤝</span> Circuit court — soutenons le local</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ===== Planning ===== -->
  <section class="section planning reveal" id="planning">
    <div class="section__inner">
      <p class="section__kicker section__kicker--center">Cette semaine</p>
      <h2 class="section__title section__title--center">Où me retrouver&nbsp;?</h2>
      <p class="planning__intro">Venez découvrir mes créations florales et passer un moment convivial&nbsp;!&nbsp;♡</p>

      <div class="planning__grid">
        <article class="card reveal">
          <div class="card__icon">🏛️</div>
          <p class="card__day">Mercredi matin</p>
          <h3 class="card__place">Marché de Gagnières</h3>
        </article>
        <article class="card reveal">
          <div class="card__icon">🏛️</div>
          <p class="card__day">Jeudi matin</p>
          <h3 class="card__place">Marché de Bessèges</h3>
        </article>
        <article class="card card--soir reveal">
          <div class="card__icon">✨</div>
          <p class="card__day">Jeudi soir</p>
          <h3 class="card__place">Guinguette de La Carabiole</h3>
        </article>
        <article class="card reveal">
          <div class="card__icon">🏛️</div>
          <p class="card__day">Vendredi matin</p>
          <h3 class="card__place">Marché de Molières-sur-Cèze</h3>
        </article>
        <article class="card reveal">
          <div class="card__icon">🏛️</div>
          <p class="card__day">Dimanche matin</p>
          <h3 class="card__place">Place de la Mairie, Bordezac</h3>
        </article>
      </div>

      <p class="planning__note">Le planning peut évoluer selon la saison et les événements — suivez-moi sur les réseaux pour les dernières infos&nbsp;!</p>
    </div>
  </section>

  <!-- ===== Carrousel des créations ===== -->
  <section class="section creations reveal" id="creations">
    <div class="section__inner">
      <p class="section__kicker section__kicker--center">La galerie</p>
      <h2 class="section__title section__title--center">Mes créations</h2>
      <p class="creations__intro">Un aperçu de mes dernières créations — survolez pour mettre en pause&nbsp;!</p>
    </div>
    <?php if (count($photosCarrousel) === 0): ?>
    <p class="etat-vide">Les premières créations arrivent bientôt… revenez vite&nbsp;! 🌷</p>
    <?php else: ?>
    <div class="carousel" aria-label="Carrousel des créations florales">
      <div class="carousel__track" style="--nb: <?= count($photosCarrousel) ?>">
        <?php for ($tour = 0; $tour < 2; $tour++): ?>
        <div class="carousel__group" <?= $tour ? 'aria-hidden="true"' : '' ?>>
          <?php foreach ($photosCarrousel as $p): ?>
          <a href="galerie.php"><img src="images/galerie/<?= rawurlencode($p) ?>" alt="Création florale Manalex Fleurs" loading="lazy"></a>
          <?php endforeach; ?>
        </div>
        <?php endfor; ?>
      </div>
    </div>
    <?php endif; ?>
    <div class="creations__more">
      <a class="btn btn--ghost" href="galerie.php">🌸 Voir toute la galerie</a>
    </div>
  </section>

  <!-- ===== Bannière ===== -->
  <section class="banner">
    <img src="images/banniere-reves.jpg" alt="Le flower truck au coucher du soleil — Crois en tes rêves et ils se réaliseront" data-fallback="🌅🚚">
  </section>

  <!-- ===== Commandes ===== -->
  <section class="section commande reveal">
    <div class="section__inner commande__box">
      <h2 class="commande__title">Une envie particulière&nbsp;?</h2>
      <p>Mariage, anniversaire, événement, ou simplement l'envie de faire plaisir&nbsp;: je réalise vos <strong>compositions sur commande</strong>. Passez me voir sur un marché ou contactez-moi&nbsp;!</p>
      <a class="btn btn--primary" href="#contact">Me contacter 💌</a>
    </div>
  </section>

  <?php include __DIR__ . '/inc/footer.php'; ?>

  <script src="js/main.js"></script>
</body>
</html>
