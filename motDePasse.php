<?php
include 'html-header.php';
include 'init.php';

$message = "";
$email = $_GET['email'] ?? '';

if (!$email) {
    $message = "<div class='alert alert-danger'>Aucun utilisateur sélectionné.</div>";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ancien = $_POST['ancien'] ?? '';
    $nouveau = $_POST['nouveau'] ?? '';

    $conn = connectDb();

    // Recherche de l'utilisateur par email
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        // Vérification de l'ancien mot de passe
        if (password_verify($ancien, $utilisateur['mot_de_passe'])) {
            // Mise à jour du nouveau mot de passe haché
            $nouveauHash = password_hash($nouveau, PASSWORD_DEFAULT);
            $sqlUpdate = "UPDATE users SET mot_de_passe = :mot_de_passe WHERE email = :email";
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->execute([
                'mot_de_passe' => $nouveauHash,
                'email' => $email
            ]);
            $message = "<div class='alert alert-success'>Mot de passe changé avec succès.</div>";
        } else {
            $message = "<div class='alert alert-danger'>Ancien mot de passe incorrect.</div>";
        }
    } else {
        $message = "<div class='alert alert-danger'>Utilisateur non trouvé.</div>";
    }
}
?>

<div class="container mt-5">
  <h2 class="mb-4">Changer le mot de passe</h2>
  <?php echo $message; ?>

  <?php if ($email): ?>
    <form method="post" class="mb-3" style="max-width:400px;">
      <div class="mb-3">
        <label class="form-label">Adresse email</label>
        <input type="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" disabled>
      </div>
      <div class="mb-3">
        <label class="form-label">Ancien mot de passe</label>
        <input type="password" class="form-control" name="ancien" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nouveau mot de passe</label>
        <input type="password" class="form-control" name="nouveau" required>
      </div>
      <button type="submit" class="btn btn-warning">Changer</button>
      <a href="javascript:history.back()" class="btn btn-secondary ms-2">Annuler</a>
    </form>
  <?php endif; ?>
</div>

<?php include 'html-footer.php'; ?>
