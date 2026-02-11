<?php
require '../config/db.php';

if(!empty($_POST['id'])){

    $stmt = $pdo->prepare("DELETE FROM items WHERE id = ?");
    
    if($stmt->execute([$_POST['id']])){
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
