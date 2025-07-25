<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des commandes clients</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Style personnalisé -->
    <link rel="stylesheet" href="public/style/style.css">

</head>

<body>


    <nav class="navbar navbar-expand-lg p-3 shadow-sm">
        <h1 class="main-title">
            <a class="navbar-brand" href="?">Mon_produit</a>
        </h1>
        <ul class="navbar-nav d-flex justify-content-center gap-3 w-100">
            <li class="nav-item">
                <a href="?action=index" class="nav-link text-center p-3">Accueil</a>
            </li>
            <li class="nav-item">
                <a href="?action=list_produit" class="nav-link text-center p-3">Liste des Produits</a>
            </li>
            <li class="nav-item">
                <a href="?action=create_produit" class="nav-link text-center p-3">nouveau Produit</a>
            </li>
        </ul>
    </nav>

    <div class="container mt-5">