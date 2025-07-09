<?php
include 'html-header.php';
include 'init.php';

$emailCible = $_GET['email'] ?? '';
$utilisateur = null;

// Connexion à la base de données
$conn = connectDb();

// Recherche de l'utilisateur dans la base de données
if ($emailCible) {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $emailCible]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="liste-users.php" class="btn btn-secondary">← Retour à la liste</a>
    <?php if ($utilisateur): ?>
      <a href="modif-users.php?email=<?= urlencode($utilisateur['email']) ?>" class="btn btn-primary">Modifier</a>
    <?php endif; ?>
  </div>

  <h2>Informations sur l'utilisateur</h2>

  <?php if ($utilisateur): ?>
    <ul class="list-group">
      <li class="list-group-item"><strong>Email :</strong> <?= htmlspecialchars($utilisateur['email']) ?></li>
      <li class="list-group-item"><strong>Prénom :</strong> <?= htmlspecialchars($utilisateur['prenom']) ?></li>
      <li class="list-group-item"><strong>Nom :</strong> <?= htmlspecialchars($utilisateur['nom']) ?></li>
      <li class="list-group-item"><strong>Mot de passe :</strong> <?= htmlspecialchars($utilisateur['mot_de_passe']) ?></li>
      <li class="list-group-item"><strong>Âge :</strong> <?= htmlspecialchars($utilisateur['age']) ?></li>
    </ul>
  <?php else: ?>
    <div class="alert alert-danger mt-4">Utilisateur introuvable.</div>
  <?php endif; ?>
</div>

<?php include 'html-footer.php'; ?>
