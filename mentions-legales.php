<?php
$navActuel = 'mentions';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, follow">
  <title>Mentions légales — Manalex Fleurs</title>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌸</text></svg>">
</head>
<body>

  <?php include __DIR__ . '/inc/nav.php'; ?>

  <!-- ===== Mentions légales ===== -->
  <section class="section legal">
    <div class="section__inner">
      <h1 class="section__title">Mentions légales</h1>

      <h2>Éditrice du site</h2>
      <p>
        [À COMPLÉTER : nom/prénom exact]<br>
        Statut : [À COMPLÉTER : ex. auto-entrepreneur]<br>
        Adresse : [À COMPLÉTER : adresse postale complète]<br>
        SIREN : [À COMPLÉTER si activité déclarée]<br>
        Téléphone : <a href="tel:+33622581230">06 22 58 12 30</a><br>
        Email : <a href="mailto:manalex.flowerstruck@gmail.com">manalex.flowerstruck@gmail.com</a>
      </p>

      <h2>Hébergement</h2>
      <p>
        IONOS SARL<br>
        7, place de la Gare — BP 70109<br>
        57201 Sarreguemines Cedex
      </p>

      <h2>Propriété intellectuelle</h2>
      <p>L'ensemble des contenus présents sur ce site (textes, photos, mise en forme) est la propriété de Manalex Fleurs ou de ses ayants droit, sauf mention contraire. Toute reproduction sans autorisation est interdite.</p>

      <h2>Contact</h2>
      <p>Pour toute question relative à ce site, vous pouvez me contacter au <a href="tel:+33622581230">06 22 58 12 30</a> ou par email à <a href="mailto:manalex.flowerstruck@gmail.com">manalex.flowerstruck@gmail.com</a>.</p>

      <a href="index.php" class="btn btn--ghost legal__retour">← Retour au site</a>
    </div>
  </section>

  <?php include __DIR__ . '/inc/footer.php'; ?>

  <script src="js/main.js"></script>
</body>
</html>
