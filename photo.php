<?php
$collection = $_GET['collection'] ?? 'galerie';
require __DIR__ . '/inc/photos.php';
$fichier = $_GET['f'] ?? '';
if (!is_string($fichier) || !preg_match('/^[A-Za-z0-9_-]+\.(?:jpe?g|png|webp)$/i', $fichier) || !in_array($fichier, $photos, true)) {
  http_response_code(404);
  exit;
}

$racine = realpath($dossierGalerie);
$chemin = realpath($dossierGalerie . DIRECTORY_SEPARATOR . $fichier);
if ($racine === false || $chemin === false || dirname($chemin) !== $racine || !is_file($chemin)) {
  http_response_code(404);
  exit;
}
$infos = @getimagesize($chemin);
$typesAutorises = ['image/jpeg', 'image/png', 'image/webp'];
if ($infos === false || !in_array($infos['mime'] ?? '', $typesAutorises, true)) {
  http_response_code(404);
  exit;
}
header('Content-Type: ' . $infos['mime']);
header('Content-Length: ' . filesize($chemin));
header('Content-Disposition: inline');
header('Cache-Control: public, max-age=86400');
readfile($chemin);
