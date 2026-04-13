<?php include 'config.php'; ?>

<h2>Ajouter un client</h2>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="telephone" placeholder="Téléphone">
    <button type="submit" name="add">Ajouter</button>
</form>
<?php
if (isset($_POST['add'])) {
    $stmt = $pdo->prepare("INSERT INTO CLIENT (nom, telephone) VALUES (?, ?)");
    $stmt->execute([$_POST['nom'], $_POST['telephone']]);
    echo "Client ajouté";
}
?>
<?php
$clients = $pdo->query("SELECT * FROM CLIENT");

foreach ($clients as $c) {
    echo "<p>" . $c['nom'] . " - " . $c['telephone'] . "</p>";
}
?>