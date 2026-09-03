<?php
// $navActuel : 'accueil' ou 'galerie' — définie par la page avant l'include,
// sert à construire les bons liens et à surligner l'onglet actif.
$navActuel = $navActuel ?? 'accueil';
$prefixeAncre = $navActuel === 'accueil' ? '#' : 'index.php#';
?>
<header class="nav" id="top">
  <a class="nav__brand" href="<?= $navActuel === 'accueil' ? '#top' : 'index.php' ?>">
    <span class="nav__logo">Manalex Fleurs</span>
  </a>
  <nav class="nav__links" id="navLinks">
    <a href="<?= $prefixeAncre ?>concept">Le concept</a>
    <a href="<?= $prefixeAncre ?>planning">Où me retrouver</a>
    <a href="galerie.php" class="<?= $navActuel === 'galerie' ? 'is-active' : '' ?>">Mes créations</a>
    <a href="<?= $prefixeAncre ?>contact">Contact</a>
  </nav>
  <button class="nav__burger" id="burger" aria-label="Ouvrir le menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</header>
