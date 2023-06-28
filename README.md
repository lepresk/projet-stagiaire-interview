# Correction du code pour le test de gestion des stagiaires

Ce dépôt contient les corrections apportées au code d'un test de gestion des stagiaires réalisé par un stagiaire lors d'un entretien d'embauche. Les modifications ont été effectuées pour résoudre les problèmes identifiés et améliorer la fonctionnalité, la qualité, la clarté et la structure du code.

## Technologies utilisées

- Bootstrap : Un framework CSS qui a été utilisé pour faciliter le développement de l'interface utilisateur et rendre le site web responsive.
- MySQL : Un système de gestion de bases de données relationnelles utilisé pour stocker les données des stagiaires.
- PHP 8 : Un langage de programmation côté serveur utilisé pour la logique de traitement et l'interaction avec la base de données.

## Prérequis

Avant de lancer le projet, assurez-vous d'avoir les éléments suivants :

- Un serveur web (par exemple Apache) configuré sur votre machine, ou
- PHP 8 installé sur votre machine pour utiliser le serveur web interne de PHP.

## Installation et exécution

Suivez les étapes ci-dessous pour installer et exécuter le projet :

1. Clonez ce dépôt sur votre machine locale.

2. Créez une base de données MySQL nommée "gestion_stagiaires".

3. Importez le fichier SQL "gestion_stagiaires.sql" fourni dans votre base de données "gestion_stagiaires". Cela créera la table "stagiaires" avec les colonnes nécessaires.

4. Ouvrez le fichier "functions.php" et modifiez les constantes suivantes avec vos propres informations de connexion à la base de données :

   ```php
   define('HOST', 'localhost');
   define('DB_NAME', 'gestion_stagiaires');
   define('USER', 'votre_nom_utilisateur');
   define('PASS', 'votre_mot_de_passe');
   ```

5. Placez les fichiers du projet dans le répertoire de votre serveur web local, ou utilisez le serveur web interne de PHP avec la commande suivante :

   ```bash
   php -S 0.0.0.0:82 -t ./
   ```

   Assurez-vous de spécifier le port et le répertoire appropriés pour votre configuration.

6. Accédez au projet via votre navigateur en utilisant l'URL correspondante (par exemple, http://localhost/gestion-stagiaires ou http://localhost:82).

Vous devriez maintenant pouvoir utiliser le projet de gestion des stagiaires avec les fonctionnalités corrigées.

N'hésitez pas à parcourir le code et à ouvrir des problèmes ou des demandes d'extraction si vous identifiez des problèmes supplémentaires ou si vous avez des suggestions d'amélioration. Merci !