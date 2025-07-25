<?php 

require_once __DIR__ . '/../lib/database.php';

class Produit{
    private string $id; 
    private $name; 
    private $quantite; 
    private float $price;

public function getId():string
{
    return $this->id; 

}
public function getName(): string
{
    return $this->name; 

}

public function getQuantite(): int{
    return $this->quantite; 
}

public function getPrice():float
{
    return $this->price; 

}

public function setId(string $id): void
{
    $this->id = $id; 
}

public function setName(string $name): void
{
    $this->name= htmlspecialchars($name); 
}

public function setQuantite(int $quantite): void
{
    $this->quantite = $quantite;
}
public function setPrice(float $price): void
{
    $this->price = $price;
}


}