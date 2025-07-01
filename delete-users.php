<?php
include 'init.php';
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


if (isPost()) {
    var_dump($_POST);
    if (($handle = fopen("users.csv", "w")) !== FALSE) {
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

?>
<?php include 'html-header.php'; ?>
  <title>supprimer un utilisateur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    
<div class="container mt-5">
  <h2 class="mb-4">formulaire de suppretion</h2>
  <form method="post">
    <div class="mb-3">
      <label for="email" class="form-label">Adresse email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <button type="submit" class="btn btn-primary">supprimer</button>
  </form>
</div>

<?php include 'html-footer.php'; 
