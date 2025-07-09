<?php
include 'html-header.php';
include 'init.php';

$conn = connectDb();
$sql = 'SELECT * FROM users ORDER BY nom';
$users = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Liste des utilisateurs</h2>
    <a href="engistrement-users.php" class="btn btn-success">Ajouter un utilisateur</a>
  </div>
  <ul class="list-group mb-4">
    <?php foreach ($users as $user): ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <span><?= htmlspecialchars($user['email']) ?></span>
        <div class="btn-group">
          <a href="info-users.php?email=<?= urlencode($user['email']) ?>" class="btn btn-primary btn-sm">Afficher</a>
          <a href="motDePasse.php?email=<?= urlencode($user['email']) ?>" class="btn btn-warning btn-sm" style="margin-left:5px;">Gérer mot de passe</a>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php include 'html-footer.php'; ?>
