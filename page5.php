<?php
include "init.php";

if (isPost()) {
    if (!empty($_POST['choix'])) {
        $choix = htmlspecialchars($_POST['choix']);
       

          if ($choix === 'corde') {
            
            header("Location: index.php");
        } 
        elseif ($choix === 'potion') {
            
            header("Location: index.php");
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
           <h1 class='border text center mt-5 text-danger'>TU T'ES FAIT NIQUER LOOOOOOOSEEEEEER !!!!!!!!!!</h1>
           <img src="assets/images/looser-aventurier.png" class="img-fluid full_div mt-5" alt="">
        <div class="border mt-3">
            <p class="mt-3 text-start p-3">Ah, toi <?php echo $_SESSION['name'] ?>

! Tu l’as bue sans te méfier, cette potion de mystification pernicieuse, avec la confiance naïve d’un touriste qui croit qu’on lui offre un verre gratuit. Tu pensais t’élever vers l’illumination, et te voilà au fond du gouffre, coiffé du bonnet d’âne de la crédulité. Parce que vois-tu, une mystification pernicieuse, ce n’est pas une simple blague ou une arnaque de marché : c’est une œuvre d’art de la tromperie, une illusion cousue main, qui t’enlace tendrement pendant qu’elle sabote ton bon sens. Bref, tu t’es fait avoir avec une telle finesse que t’en viendrais presque à applaudir. </p>
        </div>
        <form method="post">
            <div class="mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choix" id="flexRadioDefault1" value="corde">
                   <label class="form-check-label" for="flexRadioDefault1">
                    choisi tu d'être un gros looser ?
                   </label>
                </div>
                <div class="form-check"> 
                    <input class="form-check-input" type="radio" name="choix" id="flexRadioDefault2" value="potion">
                    <label class="form-check-label" for="flexRadioDefault2">
                   choisi tu d'être un énorme looser ?
                    </label>
                </div>
            </div>
            <div class="mt-3 mb-5 text-center">
                <input class="btn btn-primary" type="submit" value="looser">
            </div>
        </form>
    </div>
<?php include "html-footer.php" ?>
