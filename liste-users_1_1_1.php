<?php
include 'html-header.php';

$csvFile = "users.csv";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailToDelete = trim($_POST['email'] ?? '');
    if ($emailToDelete !== '') {
        $users = [];

        if (($handle = fopen($csvFile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if (trim($data[0]) !== $emailToDelete) {
                    $users[] = $data;
                }
            }
            fclose($handle);
        }

        if (($handle = fopen($csvFile, "w")) !== FALSE) {
            foreach ($users as $user) {
                fputcsv($handle, $user, ";");
            }
            fclose($handle);
            $message = "Utilisateur supprimé : $emailToDelete";
        }
    }
}
?>

<div class="container mt-5">
  <h2>Liste des utilisateurs</h2>

  <?php if ($message): ?>
    <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
  <?php endif; ?>

  <ul class="list-group mb-4">
    <?php
    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $email = htmlspecialchars(trim($data[0]));
            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
            echo "<span>$email</span>";
            echo "<div class='btn-group'>";
            echo "<a href='modif-users.php?email=" . urlencode($email) . "' class='btn btn-primary btn-sm'>Modifier</a>";

            echo "<form method='post' style='display:inline-block; margin-left:5px;'>";
            echo "<input type='hidden' name='email' value='" . htmlspecialchars($email) . "'>";
            echo "<button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Supprimer cet utilisateur ?\");'>Supprimer</button>";
            echo "</form>";

            echo "</div>";
            echo "</li>";
        }
        fclose($handle);
    }
    ?>
  </ul>
</div>

<?php include 'html-footer.php'; ?>
