<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h2 class="mb-4">information de produit</h2>

<p><strong>Nom : </strong> <?= $produit->getName() ?></p>
<p><strong>Quantité : </strong> <?= $produit->getQuantite() ?></p>
<p><strong>Prix : </strong> <?= $produit->getPrice() ?></p>

<a href="?action=edit_produit&id=<?= $produit->getId() ?>" class="btn btn-warning">Modifier les information</a>
<a href="?" class="btn btn-secondary">Retour à l'accueil</a>

<?php require_once __DIR__ . '/../templates/footer.php'; 