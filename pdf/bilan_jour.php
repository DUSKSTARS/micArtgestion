<?php
require '../config/db.php';
require '../vendor/autoload.php';

use Dompdf\Dompdf;

$date = $_GET['date'] ?? date('Y-m-d');

$ventes = $pdo->prepare("
    SELECT items.nom, ventes.montant
    FROM ventes
    JOIN items ON items.id = ventes.item_id
    WHERE DATE(ventes.created_at)=?
");
$ventes->execute([$date]);

$totalVentes = $pdo->query("
    SELECT IFNULL(SUM(montant),0)
    FROM ventes WHERE DATE(created_at)='$date'
")->fetchColumn();

$totalDepenses = $pdo->query("
    SELECT IFNULL(SUM(montant),0)
    FROM depenses WHERE DATE(created_at)='$date'
")->fetchColumn();

$benefice = $totalVentes - $totalDepenses;

$html = "<h2>Bilan du ".date('d/m/Y', strtotime($date))."</h2>";
$html .= "<ul>";
foreach($ventes as $v){
  $html .= "<li>{$v['nom']} - {$v['montant']} FCFA</li>";
}
$html .= "</ul>";
$html .= "<p>Ventes: $totalVentes FCFA</p>";
$html .= "<p>Dépenses: $totalDepenses FCFA</p>";
$html .= "<h3>Bénéfice: $benefice FCFA</h3>";

$pdf = new Dompdf();
$pdf->loadHtml($html);
$pdf->render();
$pdf->stream("bilan_$date.pdf", ["Attachment"=>true]);
