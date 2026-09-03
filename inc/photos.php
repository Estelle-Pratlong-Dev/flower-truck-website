<?php
// Liste les photos du dossier images/galerie/ dans l'ordre choisi depuis
// l'admin (ordre-galerie.json). Une photo jamais classée (nouvel ajout,
// ou déposée directement dans le dossier) apparaît en premier, la plus
// récente d'abord. Utilisé par index.php, galerie.php et admin.php pour
// ne pas dupliquer cette logique à plusieurs endroits.
$dossierGalerie = __DIR__ . '/../images/galerie';
$fichierOrdre = __DIR__ . '/ordre-galerie.json';

function enregistrerOrdreGalerie($fichierOrdre, $ordre) {
  file_put_contents($fichierOrdre, json_encode(array_values($ordre), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

$photosSurDisque = array_values(array_filter(scandir($dossierGalerie), function ($f) {
  return preg_match('/\.(jpe?g|png|webp)$/i', $f);
}));

$ordreEnregistre = [];
if (file_exists($fichierOrdre)) {
  $contenu = json_decode(file_get_contents($fichierOrdre), true);
  $ordreEnregistre = is_array($contenu) ? $contenu : [];
}

// Photos déjà classées (qui existent toujours), puis les nouvelles.
$photosClassees = array_values(array_intersect($ordreEnregistre, $photosSurDisque));
$photosNouvelles = array_values(array_diff($photosSurDisque, $ordreEnregistre));
usort($photosNouvelles, function ($a, $b) use ($dossierGalerie) {
  return filemtime("$dossierGalerie/$b") <=> filemtime("$dossierGalerie/$a")
    ?: strnatcasecmp($a, $b);
});

$photos = array_merge($photosNouvelles, $photosClassees);
