# Manalex Flowers Truck — Site vitrine

Site vitrine pour une activité de **flower truck itinérant** dans les Cévennes : un site simple
à faire vivre au quotidien, sans dépendre d'un prestataire pour publier une nouvelle création.

🌐 **[Voir le site en ligne](https://manalex-flowerstruck.fr/)**

---

## Le projet en bref

La cliente vend ses créations florales sur les marchés et doit pouvoir **actualiser sa galerie
de photos elle-même**, régulièrement et sans compétence technique, tout en gardant un site léger
et rapide sur mobile — le principal canal utilisé par sa clientèle.

Le parti pris technique : **du PHP simple, sans framework**, avec un espace d'administration
dédié plutôt qu'un CMS générique, pour rester au plus près du seul besoin réel du site.

## Fonctionnalités

- **Page unique** présentant le concept, le planning des marchés et une galerie de créations.
- **Espace d'administration dédié** : la cliente ajoute, réorganise et décrit ses photos depuis
  une interface simple, sans toucher au code ni au FTP.
- **Carrousel automatique** des créations en page d'accueil.
- **Formulaires de contact directs** (téléphone, email, réseaux sociaux).

## Choix techniques notables

- **Authentification maison sans base de données** : session PHP, mot de passe **haché**
  (bcrypt), protection **CSRF** sur les actions sensibles — adapté à un usage mono-utilisatrice,
  sans la charge d'une vraie gestion de comptes.
- **Téléversement d'images validé** : type réel du fichier vérifié (pas seulement l'extension),
  taille plafonnée, nom de fichier régénéré côté serveur.
- **Content Security Policy stricte** (`style-src`/`script-src` sans `unsafe-inline`) : a
  nécessité de repenser certains effets visuels (vitesse du carrousel) en CSS pur plutôt qu'en
  style injecté, pour ne pas affaiblir la politique de sécurité.
- **Référencement** soigné : données structurées (Schema.org), Open Graph, sitemap, page 404
  personnalisée, et optimisation des performances (score PageSpeed).
- **Accessibilité** : attributs ARIA sur les éléments décoratifs, alternatives textuelles
  éditables pour chaque photo de la galerie.

## Stack

PHP « vanilla » (includes) · HTML5 · CSS3 · JavaScript sans dépendance · Git

## Développement assisté par IA

L'IA a été utilisée comme outil d'assistance sur certains aspects (référencement, revue de code,
accessibilité).

## À propos

Ce projet fait partie de mon portfolio et illustre la conception d'un site vitrine complet — du
front-end à un petit back-office sécurisé — à partir d'un besoin professionnel réel.
