<?php
include "init.php";


if (isPost()) {
    if (!empty($_POST['texte'])) {
        $texte = htmlspecialchars($_POST['texte']);
        $_SESSION['name'] = $texte; 
        
        header("Location: page1.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}
?>

<?php include "html-header.php" ?>
    <div class="container text-center">
        <img src="assets/images/debut-aventure.jpg" class="img-fluid full_div mt-5" alt="">
        <div class="border mt-3">
            <p class="mt-3">Bonjour aventurier, quelle est ton nom ?</p>
        </div>
        <form method="post">
            <div class="mt-3">
                <label for="texte" class="form-label">Entrez votre texte :</label><br>
                <textarea id="texte" name="texte" rows="4" class="form-control"></textarea>
            </div>
            <div class="mt-3 mb-5">
                <input class="btn btn-primary" type="submit" value="Valider">
            </div>
        </form>
    </div>
<?php include "html-footer.php" ?>
