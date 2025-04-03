# Planétaria – Projet Laravel

Planétaria est une application web développée avec le framework Laravel. Elle permet de référencer et gérer des objets célestes tels que les planètes, les exoplanètes ou encore les satellites.

Ce dépôt contient à la fois le code source du site et les documents de conception du projet.

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

## En ligne

- Adresse à renseigner dans l'url : 90.121.52.205:50304

- Connexion au site :
    - Identifiant : user@gmail.com  
    - Password : user123
    - Identifiant : admin@gmail.com 
    - Password : admin123

- Connexion GLPI (via le site)
    - Identifiant : usertest
    - Password : Usertest!147
    
---

## Installation serveur

1. Mise à jour de la machine
```bash
sudo apt update && sudo apt upgrade -y
```

2. Installer les outils de base
```bash
sudo apt install git unzip curl php php-cli php-mbstring php-xml php-bcmath php-curl php-sqlite3 php-mysql php-fpm php-zip nginx mariadb-server composer nodejs npm -y
```

3. Cloner le projet Laravel
```bash
cd /var/www/
git clone https://github.com/utilisateur/nom-du-projet.git mon-projet
cd mon-projet
```

4. Installer les dépendance dans le projet
```bash
composer install
cp .env.example .env
php artisan key:generate
```

5. Configuration base SQLite
```bash
mkdir -p database
touch database/database.sqlite
```
- Modifier .env :
- DB_CONNECTION=sqlite
- DB_DATABASE=/var/www/mon-projet/database/database.sqlite
- configurer une redirection de port dans PfSense : ex 50305 → 192.168.30.X:80

6. Migrer base de données
```bash
php artisan migrate --seed
```

7. Droit Laravel
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data .
```

8. Compiler les assets frontend (si Vite)
```bash
npm install
npm run build
```

9. Configuration Nginx
```bash
sudo nano /etc/nginx/sites-available/mon-projet

# Contenu dans le fichier :
server {
    listen 80;
    server_name mon-projet.local; # ou IP publique
    root /var/www/mon-projet/public;
    index index.php index.html;
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
    location ~* \.(js|css|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf)$ {
        expires max;
        log_not_found off;
    }
}

ln -s /etc/nginx/sites-available/mon-projet /etc/nginx/sites-enabled/
rm /etc/nginx/sites-enabled/default
nginx -t
systemctl restart nginx
```

---

## Auteur
Projet développé par Ronan
Année : 2025

---