<?php
// Page d'erreur 404 personnalisée (déclarée dans .htaccess : ErrorDocument 404).
// On renvoie bien le code 404 pour que Google comprenne que la page n'existe pas.
http_response_code(404);
$navActuel = '404';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, follow">
  <!-- base / : les chemins fonctionnent même quand la 404 s'affiche sur une URL profonde -->
  <base href="/">
  <title>Page introuvable — Manalex Flowers Truck</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌸</text></svg>">
</head>
<body>

  <?php include __DIR__ . '/inc/nav.php'; ?>

  <section class="page-hero erreur-404">
    <p class="erreur-404__code" aria-hidden="true">🥀 404</p>
    <h1 class="section__title section__title--center">Oups, cette page s'est fanée</h1>
    <p class="page-hero__intro">La page que vous cherchez n'existe pas ou a été déplacée.<br>Mais il reste plein de fleurs à découvrir&nbsp;!</p>
    <div class="hero__cta">
      <a class="btn btn--primary" href="index.php">🏠 Retour à l'accueil</a>
      <a class="btn btn--ghost" href="galerie.php">🌸 Voir la galerie</a>
    </div>
  </section>

  <?php include __DIR__ . '/inc/footer.php'; ?>

  <script src="js/main.js"></script>
</body>
</html>
