<?php 

require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/../Produit.php';

use MongoDB\BSON\ObjectId;

class RepositoryProduit
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getProduits(): array
    {
        $collection = $this->connection->getConnection()->produits;
        $cursor = $collection->find();
        $produits = [];

        foreach ($cursor as $doc) {
            $produit = new Produit();
            $produit->setId((string) $doc['_id']);
            $produit->setName($doc['name'] ?? '');
            $produit->setQuantite((int) ($doc['quantite'] ?? 0));
            $produit->setPrice((float) ($doc['price'] ?? 0.00));

            $produits[] = $produit;
        }

        return $produits;
    }

    public function getProduit(string $id): ?Produit
    {
        $collection = $this->connection->getConnection()->produits;

        try {
            $doc = $collection->findOne(['_id' => new ObjectId($id)]);
        } catch (Exception $e) {
            return null;
        }

        if (!$doc) {
            return null;
        }

        $produit = new Produit();
        $produit->setId((string) $doc['_id']);
        $produit->setName($doc['name'] ?? '');
        $produit->setQuantite((int) ($doc['quantite'] ?? 0));
        $produit->setPrice((float) ($doc['price'] ?? 0.00));

        return $produit;
    }

    public function getProduitsByQuantite(int $quantite): array
    {
        $collection = $this->connection->getConnection()->produits;
        $cursor = $collection->find(['quantite' => $quantite]);
        $produits = [];

        foreach ($cursor as $doc) {
            $produit = new Produit();
            $produit->setId((string) $doc['_id']);
            $produit->setName($doc['name'] ?? '');
            $produit->setQuantite((int) ($doc['quantite'] ?? 0));
            $produit->setPrice((float) ($doc['price'] ?? 0.00));

            $produits[] = $produit;
        }

        return $produits;
    }

    public function create(Produit $produit): bool
    {
        $collection = $this->connection->getConnection()->produits;

        $result = $collection->insertOne([
            'name' => $produit->getName(),
            'quantite' => $produit->getQuantite(),
            'price' => $produit->getPrice(),
        ]);

        return $result->isAcknowledged();
    }

    public function update(Produit $produit): bool
    {
        $collection = $this->connection->getConnection()->produits;

        try {
            $result = $collection->updateOne(
                ['_id' => new ObjectId($produit->getId())],
                ['$set' => [
                    'name' => $produit->getName(),
                    'quantite' => $produit->getQuantite(),
                    'price' => $produit->getPrice()
                ]]
            );
            return $result->getModifiedCount() > 0;
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete(string $id): bool
    {
        $collection = $this->connection->getConnection()->produits;

        try {
            $result = $collection->deleteOne(['_id' => new ObjectId($id)]);
            return $result->getDeletedCount() > 0;
        } catch (Exception $e) {
            return false;
        }
    }
}
