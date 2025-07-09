<?php
include 'html-header.php';

$csvFile = "users.csv";
?>

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Liste des utilisateurs</h2>
    <a href="engistrement-users.php" class="btn btn-success">Ajouter un utilisateur</a>
  </div>

  <ul class="list-group mb-4">
    <?php
    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $email = htmlspecialchars(trim($data[0]));
            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
            echo "<span>$email</span>";
            echo "<div class='btn-group'>";
            echo "<a href='info-users.php?email=" . urlencode($email) . "' class='btn btn-primary btn-sm'>Afficher</a>";
            echo "<a href='motDePasse.php?email=" . urlencode($email) . "' class='btn btn-warning btn-sm' style='margin-left:5px;'>Gérer mot de passe</a>";
            echo "</div>";
            echo "</li>";
        }
        fclose($handle);
    }
    ?>
  </ul>
</div>

<?php include 'html-footer.php'; ?>
