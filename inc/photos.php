<?php
// Charge les photos ajoutées depuis l'administration et leurs métadonnées.
$dossierGalerie = __DIR__ . '/../storage/galerie';
$fichierPhotos = __DIR__ . '/../storage/photos.json';

if (!is_dir($dossierGalerie)) {
  @mkdir($dossierGalerie, 0755, true);
}

function chargerEntreesPhotos($fichierPhotos) {
  if (!is_file($fichierPhotos)) {
    return [];
  }
  $entrees = json_decode(file_get_contents($fichierPhotos), true);

  return is_array($entrees) ? $entrees : [];
}

function enregistrerOrdreGalerie($fichierPhotos, $ordre) {
  global $descriptions;
  $entrees = [];
  foreach (array_values($ordre) as $position => $fichier) {
    $entrees[] = [
      'fichier' => $fichier,
      'position' => $position + 1,
      'texte' => $descriptions[$fichier] ?? '',
    ];
  }
  file_put_contents($fichierPhotos, json_encode($entrees, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), LOCK_EX);
}

function chargerDescriptionsGalerie($fichierPhotos) {
  $descriptions = [];
  foreach (chargerEntreesPhotos($fichierPhotos) as $entree) {
    if (isset($entree['fichier']) && is_string($entree['fichier'])) {
      $descriptions[$entree['fichier']] = (string) ($entree['texte'] ?? '');
    }
  }

  return $descriptions;
}

function enregistrerDescriptionsGalerie($fichierPhotos, $descriptions) {
  global $photos;
  enregistrerOrdreGalerie($fichierPhotos, $photos);
}

function descriptionPhoto($descriptions, $fichier) {
  $texte = trim($descriptions[$fichier] ?? '');

  return $texte !== '' ? $texte : 'Création florale Manalex Flowers Truck';
}

$fichiersGalerie = is_dir($dossierGalerie) ? (@scandir($dossierGalerie) ?: []) : [];
$photosSurDisque = array_values(array_filter($fichiersGalerie, static function ($f) {
  return preg_match('/\.(jpe?g|png|webp)$/i', $f);
}));
$entreesPhotos = chargerEntreesPhotos($fichierPhotos);
usort($entreesPhotos, static fn ($a, $b) => ($a['position'] ?? PHP_INT_MAX) <=> ($b['position'] ?? PHP_INT_MAX));
$ordreEnregistre = array_values(array_filter(array_column($entreesPhotos, 'fichier'), 'is_string'));
$photosClassees = array_values(array_intersect($ordreEnregistre, $photosSurDisque));
$photosNouvelles = array_values(array_diff($photosSurDisque, $ordreEnregistre));
usort($photosNouvelles, static function ($a, $b) use ($dossierGalerie) {
  return filemtime("$dossierGalerie/$b") <=> filemtime("$dossierGalerie/$a") ?: strnatcasecmp($a, $b);
});
$photos = array_merge($photosNouvelles, $photosClassees);
$descriptions = chargerDescriptionsGalerie($fichierPhotos);
$fichierOrdre = $fichierPhotos;
$fichierDescriptions = $fichierPhotos;
