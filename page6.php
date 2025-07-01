<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Jeu de Recherche Dichotomique</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: black;
      color: white;
    }
    .game-box {
      max-width: 500px;
      margin: 100px auto;
      padding: 20px;
      background-color: #1a1a1a;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(255,255,255,0.2);
    }
  </style>
</head>
<body>
  <?php
    // Initialisation des valeurs par défaut
    $min = isset($_POST['min']) ? (int)$_POST['min'] : 1;
    $max = isset($_POST['max']) ? (int)$_POST['max'] : 100;
    /*
     * if (isset($_POST['max'])) {
     *    $max = (int)$_POST['max'];
     * } else {
     *    $max = 100;
     * }
     */
    $attempts = isset($_POST['attempts']) ? (int)$_POST['attempts'] + 1 : 1;
    $guess = floor(($min + $max) / 2);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['response'])) {
      $response = $_POST['response'];

      if ($response === 'lower') {
        $max = $guess - 1;
      } elseif ($response === 'higher') {
        $min = $guess + 1;
      } elseif ($response === 'correct') {
        echo '<div class="container text-center"><div class="game-box">';
        echo "<p class='mt-3 text-success fw-bold'>Félicitations ! Tu as trouvé le bon nombre en $attempts tentatives.</p>";
        echo '<form action="page12.php" method="get">';
        echo '<button type="submit" class="btn btn-success mt-3">Continuer</button>';
        echo '</form>';
        echo '</div></div>';
        exit;
      }

      // Nouvelle proposition après mise à jour des bornes
      $guess = floor(($min + $max) / 2);

      if ($attempts > 7 || $min > $max) {
        echo '<div class="container text-center"><div class="game-box">';
        echo "<p class='mt-3 text-danger fw-bold'>Gros looser, t'as menti ! Tu recommences tout depuis le début.</p>";
        echo '<form action="index.php" method="get">';
        echo '<button type="submit" class="btn btn-light mt-3">Revenir à l\'accueil</button>';
        echo '</form>';
        echo '</div></div>';
        exit;
      }
    }
  ?>

  <div class="container text-center">
    <div class="game-box">
      <h2>Devine ton nombre entre 1 et 100</h2>
      <p id="guess-text">Est-ce que ton nombre est <span id="current-guess"><?php echo $guess; ?></span> ?</p>
      <form method="post">
        <input type="hidden" name="min" value="<?php echo $min; ?>">
        <input type="hidden" name="max" value="<?php echo $max; ?>">
        <input type="hidden" name="attempts" value="<?php echo $attempts; ?>">
        <button name="response" value="lower" class="btn btn-danger m-2">Plus petit</button>
        <button name="response" value="correct" class="btn btn-success m-2">Correct !</button>
        <button name="response" value="higher" class="btn btn-primary m-2">Plus grand</button>
      </form>
    </div>
  </div>
</body>
</html>
