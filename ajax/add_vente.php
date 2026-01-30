<?php
require '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO ventes (item_id, montant) VALUES (?, ?)");
$stmt->execute([$_POST['item_id'], $_POST['montant']]);
echo '<div class="text-success">Vente enregistrée</div>';
?>
