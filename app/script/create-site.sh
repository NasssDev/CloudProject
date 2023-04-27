#!/bin/bash

# Créer le fichier de configuration Nginx
sudo cp ../ressource/defaultExemplesite2 /etc/nginx/sites-enabled/$3-groupe16.fr
sudo sed -i "s/VALEURUSER/$1/g" /etc/nginx/sites-enabled/$3-groupe16.fr
sudo sed -i "s/VALEURDOMAINE/$3/g" /etc/nginx/sites-enabled/$3-groupe16.fr
# Créer une page d'accueil a l'utilisateur
sudo cp ../ressource/index.html /home/$1/www2/index.html
sudo sed -i "s/VALEURUSER/$1/g" /home/$1/www2/index.html
