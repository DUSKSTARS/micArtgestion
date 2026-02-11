<?php
require '../config/db.php';

foreach($pdo->query("SELECT * FROM items ORDER BY id DESC") as $item){
    echo '
    <div class="d-flex justify-content-between align-items-center border p-2 mb-2">
        <span>'.$item['nom'].'</span>
        <button class="btn btn-danger btn-sm deleteItem" data-id="'.$item['id'].'">
            Supprimer
        </button>
    </div>
    ';
}
?>
