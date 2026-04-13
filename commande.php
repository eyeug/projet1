<?php include 'config.php'; ?>

<h2>Créer une commande</h2>

<form method="POST">
    <input type="number" name="id_client" placeholder="ID Client" required>
    <button type="submit" name="add">Créer</button>
</form>
<?php
if (isset($_POST['add'])) {
    $stmt = $pdo->prepare("INSERT INTO COMMANDE (date_commande, id_client) VALUES (NOW(), ?)");
    $stmt->execute([$_POST['id_client']]);
    echo "Commande créée";
}
?>
<?php
$commandes = $pdo->query("SELECT * FROM COMMANDE");

foreach ($commandes as $co) {
    echo "<p>Commande #" . $co['id_commande'] . " - Client: " . $co['id_client'] . "</p>";
}
?>