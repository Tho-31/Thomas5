<?php
include 'init.php';
include 'html-header.php';

$csvFile = "users.csv";
$emailCible = $_GET['email'] ?? '';
$utilisateur = null;

if (($handle = fopen($csvFile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        if (trim($data[0]) === $emailCible) {
            $utilisateur = $data;
            break;
        }
    }
    fclose($handle);
}

if (isPost()) {
    $nouveauxUsers = [];

    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            if (trim($data[0]) === $emailCible) {
                $data = [
                    $emailCible,
                    $_POST['prenom'] ?? '',
                    $_POST['nom'] ?? '',
                    $_POST['motdepasse'] ?? '',
                    $_POST['naissance'] ?? ''
                ];
            }
            $nouveauxUsers[] = $data;
        }
        fclose($handle);
    }

    if (($handle = fopen($csvFile, "w")) !== FALSE) {
        foreach ($nouveauxUsers as $u) {
            fputcsv($handle, $u, ";");
        }
        fclose($handle);
    }

    echo '<div class="alert alert-success text-center">Utilisateur modifié avec succès !</div>';
    
    $utilisateur = [$emailCible, $_POST['prenom'], $_POST['nom'], $_POST['motdepasse'], $_POST['naissance']];
}
?>

<div class="container mt-5">
  <h2 class="mb-4">Modifier l'utilisateur</h2>

  <?php if ($utilisateur): ?>
  <form method="post">
    <div class="mb-3">
      <label for="email" class="form-label">Adresse email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($utilisateur[0]) ?>" disabled>
    </div>

    <div class="mb-3">
      <label for="prenom" class="form-label">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($utilisateur[1]) ?>" required>
    </div>

    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($utilisateur[2]) ?>" required>
    </div>

    <div class="mb-3">
      <label for="motdepasse" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" id="motdepasse" name="motdepasse" value="<?= htmlspecialchars($utilisateur[3]) ?>" required>
    </div>

    <div class="mb-3">
      <label for="naissance" class="form-label">Date de naissance</label>
      <input type="date" class="form-control" id="naissance" name="naissance" value="<?= htmlspecialchars($utilisateur[4]) ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
  </form>
  <?php else: ?>
    <div class="alert alert-danger">Utilisateur introuvable.</div>
  <?php endif; ?>
</div>

<?php include 'html-footer.php'; ?>
