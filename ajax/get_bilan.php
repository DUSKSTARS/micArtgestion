<?php
require '../config/db.php';

/* 1️⃣ Récupérer toutes les dates distinctes */
$dates = $pdo->query("
    SELECT DATE(created_at) AS jour
    FROM ventes
    GROUP BY jour
    ORDER BY jour DESC
")->fetchAll(PDO::FETCH_COLUMN);

if(!$dates){
    echo "<p class='text-muted'>Aucun bilan disponible</p>";
    exit;
}

/* Totaux globaux */
$totalVentesGlobal = 0;
$totalDepensesGlobal = 0;
?>

<?php foreach($dates as $date): ?>

<?php
/* Détails ventes */
$ventes = $pdo->prepare("
    SELECT items.nom, ventes.montant, ventes.created_at
    FROM ventes
    JOIN items ON items.id = ventes.item_id
    WHERE DATE(ventes.created_at)=?
");
$ventes->execute([$date]);

/* Totaux */
$totalVentes = $pdo->prepare("
    SELECT IFNULL(SUM(montant),0)
    FROM ventes
    WHERE DATE(created_at)=?
");
$totalVentes->execute([$date]);
$totalVentes = $totalVentes->fetchColumn();

$totalDepenses = $pdo->prepare("
    SELECT IFNULL(SUM(montant),0)
    FROM depenses
    WHERE DATE(created_at)=?
");
$totalDepenses->execute([$date]);
$totalDepenses = $totalDepenses->fetchColumn();

$benefice = $totalVentes - $totalDepenses;

$totalVentesGlobal += $totalVentes;
$totalDepensesGlobal += $totalDepenses;
?>

<div class="card mb-4 shadow-sm">
  <div class="card-header d-flex justify-content-between">
    <strong>📅 <?= date('d/m/Y', strtotime($date)) ?></strong>
    <a href="pdf/bilan_jour.php?date=<?= $date ?>" class="btn btn-sm btn-outline-danger">
      📄 PDF
    </a>
  </div>

  <div class="card-body">

    <table class="table table-sm table-bordered">
      <thead class="table-light">
        <tr>
          <th>Produit</th>
          <th>Montant</th>
          <th>Heure</th>
        </tr>
      </thead>
      <tbody>
        <?php if($ventes->rowCount()): ?>
          <?php foreach($ventes as $v): ?>
          <tr>
            <td><?= htmlspecialchars($v['nom']) ?></td>
            <td><?= number_format($v['montant'],0,',',' ') ?> FCFA</td>
            <td><?= date('H:i', strtotime($v['created_at'])) ?></td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="text-center text-muted">Aucune vente</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <p>💰 <strong>Ventes :</strong> <?= number_format($totalVentes,0,',',' ') ?> FCFA</p>
    <p>💸 <strong>Dépenses :</strong> <?= number_format($totalDepenses,0,',',' ') ?> FCFA</p>
    <p class="fs-5">
      ✅ <strong>Bénéfice :</strong> <?= number_format($benefice,0,',',' ') ?> FCFA
    </p>

  </div>
</div>

<?php endforeach; ?>

<hr>

<h4 class="text-end">
  📊 <strong>Bilan Général :</strong><br>
  💰 <?= number_format($totalVentesGlobal,0,',',' ') ?> FCFA<br>
  💸 <?= number_format($totalDepensesGlobal,0,',',' ') ?> FCFA<br>
  ✅ <?= number_format($totalVentesGlobal - $totalDepensesGlobal,0,',',' ') ?> FCFA
</h4>

<a href="pdf/bilan_global.php" class="btn btn-danger mt-3">
  📥 Télécharger tout le bilan en PDF
</a>
