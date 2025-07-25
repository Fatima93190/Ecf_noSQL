<?php

require_once __DIR__ . '/controllers/AccueilController.php';
require_once __DIR__ . '/controllers/ProduitController.php';

$produitController = new ProduitController();
$accueilController = new AccueilController();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {

    case 'list_produit':
        $produitController->list_produit();
        break;
    case 'view_produit':
        $produitController->show_produit($id);
        break;
    case 'create_produit':
        $produitController->create_produit();
        break;
    case 'index':
        $accueilController->home();
        break;
    case 'store_produit':
        $produitController->store_produit();
        break;
    case 'edit_produit':
        $produitController->edit_produit($id);
        break;
    case 'update_produit':
        $produitController->update_produit();
        break;
    case 'delete_produit':
        $produitController->delete_produit($id);
        break;
    default:
        $produitController->forbidden();
        break;
}


