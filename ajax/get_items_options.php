<?php
require '../config/db.php';

echo '<option value="">Choisir un inventaire</option>';

foreach($pdo->query("SELECT * FROM items ORDER BY id DESC") as $item){
    echo '<option value="'.$item['id'].'">'.$item['nom'].'</option>';
}
?>
