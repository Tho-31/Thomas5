<?php
include 'html-header.php';

$csvFile = "users.csv";
$emailCible = $_GET['email'] ?? '';
$utilisateur = null;

// Recherche de l'utilisateur dans le fichier CSV
if (($handle = fopen($csvFile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        if (trim($data[0]) === $emailCible) {
            $utilisateur = $data;
            break;
        }
    }
    fclose($handle);
}
?>

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="liste-users.php" class="btn btn-secondary">← Retour à la liste</a>
    <?php if ($utilisateur): ?>
      <a href="modif-users.php?email=<?= urlencode($utilisateur[0]) ?>" class="btn btn-primary">Modifier</a>
    <?php endif; ?>
  </div>

  <h2>Informations sur l'utilisateur</h2>

  <?php if ($utilisateur): ?>
    <ul class="list-group">
      <li class="list-group-item"><strong>Email :</strong> <?= htmlspecialchars($utilisateur[0]) ?></li>
      <li class="list-group-item"><strong>Prénom :</strong> <?= htmlspecialchars($utilisateur[1]) ?></li>
      <li class="list-group-item"><strong>Nom :</strong> <?= htmlspecialchars($utilisateur[2]) ?></li>
      <li class="list-group-item"><strong>Mot de passe :</strong> <?= htmlspecialchars($utilisateur[3]) ?></li>
      <li class="list-group-item"><strong>Date de naissance :</strong> <?= htmlspecialchars($utilisateur[4]) ?></li>
    </ul>
  <?php else: ?>
    <div class="alert alert-danger mt-4">Utilisateur introuvable.</div>
  <?php endif; ?>
</div>

<?php include 'html-footer.php'; ?>
