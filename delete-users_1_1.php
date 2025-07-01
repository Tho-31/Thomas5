<?php
include 'html-header.php';

$csvFile = "users.csv";
$message = "";

// Suppression si formulaire envoyé
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailToDelete = trim($_POST['email'] ?? '');

    if ($emailToDelete !== '') {
        $users = [];

        // Lire tous les utilisateurs
        if (($handle = fopen($csvFile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if (trim($data[0]) !== $emailToDelete) {
                    $users[] = $data;
                }
            }
            fclose($handle);
        }

        // Réécrire le fichier sans l'utilisateur
        if (($handle = fopen($csvFile, "w")) !== FALSE) {
            foreach ($users as $user) {
                fputcsv($handle, $user, ";");
            }
            fclose($handle);
            $message = "Utilisateur supprimé (s'il existait).";
        }
    } else {
        $message = "Veuillez entrer une adresse email.";
    }
}
?>

<div class="container mt-5">
  <h2>Liste des utilisateurs</h2>
  <ul class="list-group mb-4">
    <?php
    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            echo "<li class='list-group-item'>" . implode(" | ", $data) . "</li>";
        }
        fclose($handle);
    }
    ?>
  </ul>

  <?php if ($message): ?>
    <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
  <?php endif; ?>

  <h4>Supprimer un utilisateur</h4>
  <form method="post">
    <div class="mb-3">
      <label for="email" class="form-label">Adresse email à supprimer</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <button type="submit" class="btn btn-danger">Supprimer</button>
  </form>
</div>

<?php include 'html-footer.php'; ?>
