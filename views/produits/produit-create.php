<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h2 class="mb-4">Ajouter un nouveau produit</h2>
<?php if (isset($_GET['error'])): ?>
    <?php if ($_GET['error'] === 'quantite_invalide'): ?>
        <div class="alert alert-danger" role="alert">
            La quantité doit être un nombre entier supérieur à 0.
        </div>
    <?php elseif ($_GET['error'] === 'prix_invalide'): ?>
        <div class="alert alert-danger" role="alert">
            Le prix doit être un nombre positif ou nul.
        </div>
    <?php endif; ?>
<?php endif; ?>

<form action="?action=store_produit" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Name :</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité :</label>
        <input type="number" class="form-control" id="quantite" name="quantite" min="1" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prix :</label>
        <input type="number" class="form-control" id="price" name="price" min="0" step="any" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<a href="?action=list_produit" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/../templates/footer.php';