<?php
$host = 'localhost';
$db   = 'inventaire_app';
$user = 'root'; // à adapter
$pass = '';     // à adapter

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur connexion : ' . $e->getMessage());
}
?>
