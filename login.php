<?php
session_start();

include "users.php"; // contient $users

$error = '';
// verifi si la requete est une requete post.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // prend le champ email du formulaire et met dans la variable $email,
    //  si le champ n'est pas defini on affecte vide.
    $email = $_POST['email'] ?? '';
    // on recupere passxord.
    $password = $_POST['password'] ?? '';
// on recherche si le user existe et si c'est le cas on verifie le mot de passe.
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $_SESSION['user'] = $user;
            header("Location: user-controller_3.php");
            exit;
        }
    }

    $error = "Email ou mot de passe incorrect.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Connexion</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" class="card p-4 shadow-sm bg-white rounded">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
</body>
</html>
