<?php
require __DIR__ . '/inc/admin-auth.php';

// ----- Déconnexion -----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'deconnexion') {
  adminDeconnecter();
  header('Location: admin.php');
  exit;
}

// ----- Connexion -----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'connexion') {
  if (adminVerifierIdentifiants($_POST['pseudo'] ?? '', $_POST['mot_de_passe'] ?? '')) {
    adminConnecter();
    header('Location: admin.php');
    exit;
  }
  adminDefinirMessage('Pseudo ou mot de passe incorrect.', 'erreur');
  header('Location: admin.php');
  exit;
}

// Tout ce qui suit nécessite d'être connectée.
if (!adminEstConnecte()) {
  $message = adminRecupererMessage();
  ?>
  <!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Connexion — Manalex Fleurs</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="admin-body">
    <main class="admin-login">
      <h1>Espace créations</h1>
      <?php if ($message): ?>
      <p class="admin-flash admin-flash--<?= htmlspecialchars($message['type']) ?>"><?= htmlspecialchars($message['texte']) ?></p>
      <?php endif; ?>
      <form method="post">
        <input type="hidden" name="action" value="connexion">
        <label>
          Pseudo
          <input type="text" name="pseudo" autocomplete="username" required autofocus>
        </label>
        <label>
          Mot de passe
          <input type="password" name="mot_de_passe" autocomplete="current-password" required>
        </label>
        <button class="btn btn--primary" type="submit">Se connecter</button>
      </form>
    </main>
  </body>
  </html>
  <?php
  exit;
}

// ----- Ajout d'une photo -----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'ajouter') {
  if (!adminJetonCsrfValide($_POST['csrf'] ?? '')) {
    adminDefinirMessage('Session expirée, merci de réessayer.', 'erreur');
  } else {
    require __DIR__ . '/inc/photos.php';
    $resultat = adminAjouterPhoto($_FILES['photo'] ?? null, $dossierGalerie);
    if ($resultat['erreur']) {
      adminDefinirMessage($resultat['erreur'], 'erreur');
    } else {
      // La nouvelle photo apparaît en premier dans la galerie.
      array_unshift($photos, $resultat['fichier']);
      enregistrerOrdreGalerie($fichierOrdre, $photos);
      adminDefinirMessage('Photo ajoutée avec succès !', 'succes');
    }
  }
  header('Location: admin.php');
  exit;
}

// ----- Suppression d'une photo -----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'supprimer') {
  if (!adminJetonCsrfValide($_POST['csrf'] ?? '')) {
    adminDefinirMessage('Session expirée, merci de réessayer.', 'erreur');
  } else {
    require __DIR__ . '/inc/photos.php';
    $fichier = basename($_POST['fichier'] ?? '');
    if (in_array($fichier, $photos, true) && unlink("$dossierGalerie/$fichier")) {
      $photos = array_values(array_diff($photos, [$fichier]));
      enregistrerOrdreGalerie($fichierOrdre, $photos);
      adminDefinirMessage('Photo supprimée.', 'succes');
    } else {
      adminDefinirMessage("Impossible de supprimer cette photo (elle n'existe peut-être plus).", 'erreur');
    }
  }
  header('Location: admin.php');
  exit;
}

// ----- Réordonnancement d'une photo (monter / descendre) -----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && in_array($_POST['action'] ?? '', ['monter', 'descendre'], true)) {
  if (!adminJetonCsrfValide($_POST['csrf'] ?? '')) {
    adminDefinirMessage('Session expirée, merci de réessayer.', 'erreur');
  } else {
    require __DIR__ . '/inc/photos.php';
    $fichier = basename($_POST['fichier'] ?? '');
    $index = array_search($fichier, $photos, true);
    $nouvelIndex = $index + ($_POST['action'] === 'monter' ? -1 : 1);
    if ($index !== false && isset($photos[$nouvelIndex])) {
      [$photos[$index], $photos[$nouvelIndex]] = [$photos[$nouvelIndex], $photos[$index]];
      enregistrerOrdreGalerie($fichierOrdre, $photos);
    }
  }
  header('Location: admin.php');
  exit;
}

function adminAjouterPhoto($fichier, $dossierGalerie) {
  if (!$fichier || $fichier['error'] === UPLOAD_ERR_NO_FILE) {
    return ['erreur' => 'Merci de choisir une photo.', 'fichier' => null];
  }
  if ($fichier['error'] !== UPLOAD_ERR_OK) {
    return ['erreur' => "Échec de l'envoi (fichier trop volumineux ou erreur réseau).", 'fichier' => null];
  }
  if ($fichier['size'] > 8 * 1024 * 1024) {
    return ['erreur' => 'La photo dépasse la taille maximale de 8 Mo.', 'fichier' => null];
  }

  $infos = getimagesize($fichier['tmp_name']);
  $extensions = [IMAGETYPE_JPEG => 'jpg', IMAGETYPE_PNG => 'png', IMAGETYPE_WEBP => 'webp'];
  if (!$infos || !isset($extensions[$infos[2]])) {
    return ['erreur' => 'Format non supporté (jpg, png ou webp uniquement).', 'fichier' => null];
  }

  $nomFichier = date('Ymd-His') . '-' . bin2hex(random_bytes(3)) . '.' . $extensions[$infos[2]];
  if (!move_uploaded_file($fichier['tmp_name'], "$dossierGalerie/$nomFichier")) {
    return ['erreur' => "Échec de l'enregistrement de la photo sur le serveur.", 'fichier' => null];
  }
  return ['erreur' => null, 'fichier' => $nomFichier];
}

$message = adminRecupererMessage();
require __DIR__ . '/inc/photos.php';
$csrf = adminJetonCsrf();
$dernierIndex = count($photos) - 1;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow">
  <title>Gérer les créations — Manalex Fleurs</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="admin-body">

  <header class="admin-header">
    <h1>Gérer les créations</h1>
    <form method="post">
      <input type="hidden" name="action" value="deconnexion">
      <button class="btn btn--ghost" type="submit">Se déconnecter</button>
    </form>
  </header>

  <main class="admin-main">
    <?php if ($message): ?>
    <p class="admin-flash admin-flash--<?= htmlspecialchars($message['type']) ?>"><?= htmlspecialchars($message['texte']) ?></p>
    <?php endif; ?>

    <section class="admin-upload">
      <h2>Ajouter une photo</h2>
      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="ajouter">
        <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
        <input type="file" name="photo" accept="image/jpeg,image/png,image/webp" required>
        <button class="btn btn--primary" type="submit">Ajouter</button>
      </form>
    </section>

    <section class="admin-gallery">
      <h2>Photos actuelles (<?= count($photos) ?>)</h2>
      <p class="admin-gallery__aide">L'ordre choisi ici est celui affiché sur le site.</p>
      <?php if (count($photos) === 0): ?>
      <p class="etat-vide">Aucune photo pour le moment.</p>
      <?php else: ?>
      <div class="admin-grid">
        <?php foreach ($photos as $i => $p): ?>
        <figure class="admin-grid__item">
          <img src="images/galerie/<?= rawurlencode($p) ?>" alt="" loading="lazy">
          <div class="admin-grid__actions">
            <form method="post">
              <input type="hidden" name="action" value="monter">
              <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
              <input type="hidden" name="fichier" value="<?= htmlspecialchars($p) ?>">
              <button class="btn-icone" type="submit" aria-label="Monter" <?= $i === 0 ? 'disabled' : '' ?>>▲</button>
            </form>
            <form method="post">
              <input type="hidden" name="action" value="descendre">
              <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
              <input type="hidden" name="fichier" value="<?= htmlspecialchars($p) ?>">
              <button class="btn-icone" type="submit" aria-label="Descendre" <?= $i === $dernierIndex ? 'disabled' : '' ?>>▼</button>
            </form>
            <form method="post" onsubmit="return confirm('Supprimer définitivement cette photo ?');">
              <input type="hidden" name="action" value="supprimer">
              <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
              <input type="hidden" name="fichier" value="<?= htmlspecialchars($p) ?>">
              <button class="btn btn--ghost" type="submit">🗑️ Supprimer</button>
            </form>
          </div>
        </figure>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </section>
  </main>
</body>
</html>
