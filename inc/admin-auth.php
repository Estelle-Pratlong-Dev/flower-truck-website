<?php
// Authentification simple (pseudo + mot de passe) pour la page /admin.php.
// Pas de base de données : les identifiants viennent de admin-config.php,
// la session PHP garde l'utilisatrice connectée.

session_set_cookie_params([
  'httponly' => true,
  'samesite' => 'Lax',
  'secure'   => !empty($_SERVER['HTTPS']),
]);
session_start();

function adminEstConnecte() {
  return !empty($_SESSION['admin_connecte']);
}

function adminVerifierIdentifiants($pseudo, $motDePasse) {
  $config = require __DIR__ . '/admin-config.php';
  $pseudoOk = hash_equals($config['pseudo'], (string) $pseudo);
  $motDePasseOk = password_verify((string) $motDePasse, $config['password_hash']);
  return $pseudoOk && $motDePasseOk;
}

function adminConnecter() {
  session_regenerate_id(true);
  $_SESSION['admin_connecte'] = true;
}

function adminDeconnecter() {
  $_SESSION = [];
  session_destroy();
}

// Jeton anti-CSRF : un seul jeton par session, généré à la demande.
function adminJetonCsrf() {
  if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
  }
  return $_SESSION['csrf'];
}

function adminJetonCsrfValide($jeton) {
  return !empty($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], (string) $jeton);
}

// Message ponctuel affiché une seule fois (succès/erreur) après une action.
function adminDefinirMessage($texte, $type = 'succes') {
  $_SESSION['flash'] = ['texte' => $texte, 'type' => $type];
}

function adminRecupererMessage() {
  if (empty($_SESSION['flash'])) {
    return null;
  }
  $message = $_SESSION['flash'];
  unset($_SESSION['flash']);
  return $message;
}
