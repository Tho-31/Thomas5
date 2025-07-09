<?php
include 'html-header.php';

$csvFile = "users.csv";
$message = "";
$email = $_GET['email'] ?? '';

if (!$email) {
    $message = "Aucun utilisateur sélectionné.";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ancien = $_POST['ancien'] ?? '';
    $nouveau = $_POST['nouveau'] ?? '';
    $trouve = false;
    $users = [];

    // Lecture du CSV et recherche de l'utilisateur
    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            if (trim($data[0]) === $email) {
                $trouve = true;
                // Vérifie l'ancien mot de passe
                if (password_verify($ancien, $data[3])) {
                    // Hache le nouveau mot de passe
                    $data[3] = password_hash($nouveau, PASSWORD_DEFAULT);
                    $message = "<div class='alert alert-success'>Mot de passe changé avec succès.</div>";
                } else {
                    $message = "<div class='alert alert-danger'>Ancien mot de passe incorrect.</div>";
                }
            }
            $users[] = $data;
        }
        fclose($handle);
    }

    // Réécriture du CSV si modification
    if ($trouve && strpos($message, 'succès') !== false) {
        if (($handle = fopen($csvFile, "w")) !== FALSE) {
            foreach ($users as $user) {
                fputcsv($handle, $user, ";");
            }
            fclose($handle);
        }
    } elseif (!$trouve) {
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
