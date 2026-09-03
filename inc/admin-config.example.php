<?php
// Copier ce fichier en "admin-config.php" (même dossier) et changer les
// valeurs ci-dessous. admin-config.php n'est jamais versionné (voir
// .gitignore) : c'est la seule chose qui protège la page /admin.php.
//
// Pour générer un nouveau hash de mot de passe, lancer en ligne de commande :
//   php -r "echo password_hash('votre-mot-de-passe', PASSWORD_DEFAULT), PHP_EOL;"
// et coller le résultat ci-dessous.

return [
  'pseudo'        => 'change-moi',
  'password_hash' => 'COLLER_ICI_LE_HASH_GENERE',
];
