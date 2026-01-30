<?php
require '../config/db.php';

if (!empty($_POST['libelle']) && !empty($_POST['montant'])) {

    $libelle = trim($_POST['libelle']);
    $montant = floatval($_POST['montant']);

    $stmt = $pdo->prepare("
        INSERT INTO depenses (libelle, montant, created_at)
        VALUES (?, ?, NOW())
    ");

    if ($stmt->execute([$libelle, $montant])) {
        echo '<div class="alert alert-success">Dépense ajoutée avec succès</div>';
    } else {
        echo '<div class="alert alert-danger">Erreur lors de l\'ajout</div>';
    }

} else {
    echo '<div class="alert alert-warning">Veuillez remplir tous les champs</div>';
}
