# Planétaria – Projet Laravel

Planétaria est une application web développée avec le framework Laravel. Elle permet de référencer et gérer des objets célestes tels que les planètes, les exoplanètes ou encore les satellites.

Ce dépôt contient à la fois le code source du site et les documents de conception du projet.

---

## Structure du dépôt

---

## Fonctionnalités principales

- Création, modification, suppression et consultation d’objets célestes
- Classification par type (planète, exoplanète, satellite)
- Interface d’administration
- Base de données avec migrations et seeders
- Prévision d’ajouts : galerie d’images, système de recherche

---

## Technologies utilisées

- Laravel 11.x
- PHP 8.3
- SQLite
- Blade
- Tailwind CSS (configuration de base)

---

## Installation locale

1. Se placer dans le dossier `Planetaria`
2. Dupliquer le fichier `.env.example` en `.env`

Par défaut, le projet utilise SQLite. Assurez-vous que le fichier database/database.sqlite existe et que les permissions sont correctes.

3. Exécuter les commandes suivantes :

```bash
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serv
--> lien généré en localhost
