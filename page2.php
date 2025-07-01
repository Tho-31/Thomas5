<?php
include "init.php";

if (isPost()) {
    if (!empty($_POST['choix'])) {
        $choix = htmlspecialchars($_POST['choix']);
       

          if ($choix === 'corde') {
            
            header("Location: page4.php");
        } 
        elseif ($choix === 'potion') {
            
            header("Location: page5.php");
        } else {
            header("Location: page1.php");
        }
        exit;
    } else {
        header("Location: page1.php");
        exit;
    }
}
?>


<?php include "html-header.php" ?>
    <div class="container">
        <img src="assets/images/magasin-aventurier.png" class="img-fluid full_div mt-5" alt="">
        <div class="border mt-3">
            <p class="mt-3 text-start p-3">toi <?php echo $_SESSION['name'] ?>

, l’aventurier, regarde bien autour de toi. Chaque objet ici peut faire la différence entre la survie et l’échec. Choisis avec soin : la corde qui te sauvera d’un ravin, la potion qui soignera tes blessures, la carte qui te guidera dans l’inconnu.

Ce magasin, c’est ton dernier havre avant l'aventure. Une fois dehors, plus de confort, plus de certitudes. Juste toi, ton courage… et ce que tu emportes avec toi.

Prépare-toi. Le monde t’attend. </p>
        </div>
        <form method="post">
            <div class="mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choix" id="flexRadioDefault1" value="corde">
                   <label class="form-check-label" for="flexRadioDefault1">
                    choisi tu de prendre la corde ?
                   </label>
                </div>
                <div class="form-check"> 
                    <input class="form-check-input" type="radio" name="choix" id="flexRadioDefault2" value="potion">
                    <label class="form-check-label" for="flexRadioDefault2">
                   choisi tu de prendre la potion a mystification pernicieuse ?
                    </label>
                </div>
            </div>
            <div class="mt-3 mb-5 text-center">
                <input class="btn btn-primary" type="submit" value="Valider">
            </div>
        </form>
    </div>
<?php include "html-footer.php" ?>
