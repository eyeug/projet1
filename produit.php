<?php include 'config.php'; ?>

<h2>Ajouter un produit</h2>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom produit" required>
    <input type="number" name="prix" placeholder="Prix">
    <button type="submit" name="add">Ajouter</button>
</form>
<?php
if (isset($_POST['add'])) {
    $stmt = $pdo->prepare("INSERT INTO PRODUIT (nom_produit, prix_unitaire) VALUES (?, ?)");
    $stmt->execute([$_POST['nom'], $_POST['prix']]);
    echo "Produit ajouté";
}
?>
<?php
$produits = $pdo->query("SELECT * FROM PRODUIT");

foreach ($produits as $p) {
    echo "<p>" . $p['nom_produit'] . " - " . $p['prix_unitaire'] . " FCFA</p>";
}
?>
