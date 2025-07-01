<?php
include 'html-header.php';

$csvFile = "users.csv";
?>

<div class="container mt-5">
  <h2>Liste des utilisateurs</h2>
  <ul class="list-group mb-4">
    <?php
    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $email = htmlspecialchars(trim($data[0]));
            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
            echo "<span>$email</span>";
            echo "<a href='modif-users.php?email=" . urlencode($email) . "' class='btn btn-primary btn-sm'>Modifier</a>";
            echo "</li>";
        }
        fclose($handle);
    }
    ?>
  </ul>
</div>

<?php include 'html-footer.php'; ?>
