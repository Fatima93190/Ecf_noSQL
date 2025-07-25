# Exercice ECF – PHP MVC & MongoDB

##  Objectif

Développer une mini-application web en **PHP** en suivant le modèle **MVC** et en utilisant **MongoDB** comme base de données NoSQL.  
L’objectif est de gérer des produits (CRUD) tout en apprenant à connecter MongoDB à un projet PHP.

---

##  Fonctionnalités de l’application

- ** Page d’accueil** : affiche tous les produits dans un tableau.
- ** Ajouter un produit** : formulaire avec nom, quantité et prix.
- ** Modifier un produit** : formulaire pré-rempli avec les données du produit.
- ** Supprimer un produit** : avec confirmation via une alerte JavaScript.
- ** Voir un produit** : détails d’un produit individuel (optionnel mais présent ici).

---

##  Architecture du projet

Le projet est structuré en MVC :

```YAML
├── controllers/ # Contrôleurs : logique métier
├── models/ # Modèles : classes + repository MongoDB
├── views/ # Vues HTML en PHP
├── public/style/ # Feuilles de style CSS
├── lib/database.php # Connexion MongoDB via MongoDB\Client
├── index.php # Point d’entrée + routing simple
├── vendor/ # Dépendances Composer (non versionnées)
├── composer.json # Dépendances PHP (ex : mongodb/mongodb)
└── .gitignore # Ignore vendor/
```
##  Base de données MongoDB

- **Base** : `testdb`
- **Collection** : `produits`
- Chaque produit contient :
  - `name` (string)
  - `quantite` (int)
  - `price` (float)

Exemple de document MongoDB :
```json
{
  "_id": ObjectId("..."),
  "name": "Produit A",
  "quantite": 5,
  "price": 12.99
}
```

##  Prérequis

- PHP ≥ 8.0
- [Composer](https://getcomposer.org/)
- MongoDB installé localement
- Extension PHP MongoDB activée (`php_mongodb.dll`)
- Serveur local (XAMPP ou serveur intégré PHP)

##  Installation

### 1. **Cloner le projet**

```bash
git clone https://github.com/Fatima93190/Ecf_noSQL.git
cd Ecf_noSQL
```

###  2. Installer les dépendances PHP (MongoDB)

```bash
composer install
```
Si l’extension MongoDB n’est pas installée :

1. Télécharge `php_mongodb.dll` depuis [PECL (php.net)](https://pecl.php.net/package/mongodb)
2. Place le fichier téléchargé dans le dossier `ext/` de PHP, par exemple :

C:\xampp\php\ext\

3. Ajoute la ligne suivante à la fin de ton fichier `php.ini` :

```ini
extension=mongodb
```
4. Redémarre Apache (via XAMPP) ou ton serveur PHP intégré pour appliquer les changements.

### 3. Configuration de la connexion MongoDB
Dans lib/database.php, adapte l’URI de connexion si besoin :

```php
$uri = "mongodb://localhost:27017";
$dbname = "testdb";
```
### 4. Lancer l’application
#### Option A — avec le serveur intégré PHP :
```php
php -S localhost:8000
```
Puis ouvre http://localhost:8000 dans ton navigateur.

#### Option B — avec XAMPP (Apache) :
Place le projet dans C:\xampp\htdocs\
et accède à :
http://localhost/Ecf_noSQL

