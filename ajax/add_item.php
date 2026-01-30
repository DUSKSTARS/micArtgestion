<?php
require '../config/db.php';
if(!empty($_POST['nom'])){
$stmt = $pdo->prepare("INSERT INTO items (nom) VALUES (?)");
$stmt->execute([$_POST['nom']]);
echo '<div class="text-success">Inventaire enregistré</div>';
}
?>
