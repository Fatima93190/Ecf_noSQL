<?php
require_once __DIR__ . '/../models/repository/RepositoryProduit.php';

class AccueilController{

    private RepositoryProduit $repositoryProduit;

    public function __construct(){
        $this->repositoryProduit = new RepositoryProduit();
    }

    
    public function home()
    {
        $produits = $this->repositoryProduit->getProduits();

        require_once __DIR__ . '/../views/home.php';
    }



    
}

?>