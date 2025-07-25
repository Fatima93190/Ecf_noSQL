<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h2 class="mb-4">Modifier une commande</h2>

<form action="?action=update_produit" method="POST">
    <input type="hidden" name="id" value="<?= $produit->getId() ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Name :</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $produit->getName() ?>" required>
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantite :</label>
        <input type="text" class="form-control" id="quantite" name="quantite" value="<?= $produit->getQuantite() ?>" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price :</label>
        <input type="text" class="form-control" id="price" name="price" step="any" value="<?= $produit->getPrice() ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<a href="?action=produit_list" class="btn btn-secondary">Retour à la liste</a>


<?php require_once __DIR__ . '/../templates/footer.php'; 