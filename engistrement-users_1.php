<?php
include 'init.php';
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
// interieur de isPost doit faire 4 lignes
if (isPost()) {
    var_dump($_POST);
    
/*    $email = $_POST['email'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $motdepasse = $_POST['motdepasse'] ?? '';
    $naissance = $_POST['naissance'] ?? ''; */
 
//  le fputcsv doit tenir en moins de 30 caracteres  
    
    if (($handle = fopen("users.csv", "a")) !== FALSE) {
        fputcsv($handle, $_POST, ";");
        fclose($handle);
    }
}

$row = 1;
if (($handle = fopen("users.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        echo "<p> $num champs à la ligne $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}


/**
 * faire un formulaire qui permet de saisir tous les champs de utilisateur
 * et ajouter l'utilisateur au fichier users.csv
 * fputcsv
 */
?>
<?php include 'html-header.php'; ?>
  <title>Formulaire d'inscription</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    
<div class="container mt-5">
  <h2 class="mb-4">Formulaire d'enregistrement</h2>
  <form method="post">
    <div class="mb-3">
      <label for="email" class="form-label">Adresse email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
      <label for="prenom" class="form-label">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" required>
    </div>

    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>

    <div class="mb-3">
      <label for="motdepasse" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" id="motdepasse" name="motdepasse" required>
    </div>

    <div class="mb-3">
      <label for="naissance" class="form-label">Date de naissance</label>
      <input type="date" class="form-control" id="naissance" name="naissance" required>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </form>
</div>

<?php include 'html-footer.php'; 

