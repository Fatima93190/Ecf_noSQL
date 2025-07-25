<?php

require_once __DIR__ . '/../models/Repository/RepositoryProduit.php';
require_once __DIR__ . '/../models/Produit.php';

class ProduitController
{
    private RepositoryProduit $repositoryProduit;

    public function __construct()
    {
        $this->repositoryProduit = new RepositoryProduit();
    }

    public function list_produit()
    {
        $produits = $this->repositoryProduit->getProduits();
        require_once __DIR__ . '/../views/produits/produit-list.php';
    }

    public function show_produit(string $id)
    {
        $produit = $this->repositoryProduit->getProduit($id);
        require_once __DIR__ . '/../views/produits/produit-view.php';
    }

    public function create_produit()
    {
        require_once __DIR__ . '/../views/produits/produit-create.php';
    }

    public function store_produit()
    {
        $produit = new Produit();
        $produit->setName($_POST['name']);
        $produit->setQuantite((int) $_POST['quantite']);
        $produit->setPrice((float) $_POST['price']);

        $this->repositoryProduit->create($produit);
        header('Location: ?action=list_produit');
    }

    public function edit_produit(string $id)
    {
        $produit = $this->repositoryProduit->getProduit($id);
        require_once __DIR__ . '/../views/produits/produit-edit.php';
    }

    public function update_produit()
    {
        $id = $_POST['id'];

        $produit = new Produit();
        $produit->setId($id); 
        $produit->setName($_POST['name']);
        $produit->setQuantite((int) $_POST['quantite']);
        $produit->setPrice((float) $_POST['price']);

        $this->repositoryProduit->update($produit);
        header('Location: ?action=list_produit');
    }

    public function delete_produit(string $id)
    {
        $this->repositoryProduit->delete($id);
        header('Location: ?action=list_produit');
    }

    public function forbidden()
    {
        require_once __DIR__ . '/../views/404.php';
        http_response_code(404);
    }
}
