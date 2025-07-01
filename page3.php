<?php
include "init.php";

if (isPost()) {
    if (!empty($_POST['choix'])) {
        $choix = htmlspecialchars($_POST['choix']);
        

          if ($choix === 'magasin') {
            
            header("Location: page6.php");
        } 
        elseif ($choix === 'pyramide') {
            
            header("Location: page7.php");
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
        <img src="assets/images/pyramide-interieur.png" class="img-fluid full_div mt-5" alt="">
        <div class="border mt-3">
            <p class="mt-3 text-start p-3">Toi qui franchis le seuil de cette pyramide oubliée, sois sur tes gardes.

Chaque pierre ici murmure les secrets d’un ancien royaume, chaque ombre cache peut-être un piège ou un trésor. Regarde ces murs — les hiéroglyphes ne sont pas que décor, ils sont avertissements, mémoire et magie.

Tes pas foulent le sol qu’ont arpenté pharaons, prêtres et voleurs d’un autre âge. Tu n’es pas le premier à entrer, mais rares sont ceux qui en sont sortis.

Reste prudent, écoute ton instinct… et n’oublie jamais : ce lieu ne révèle ses merveilles qu’à ceux qui savent respecter ses mystères. </p>
        </div>
        <form method="post">
            <div class="mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choix" id="flexRadioDefault1" value="magasin">
                   <label class="form-check-label" for="flexRadioDefault1">
                    choisi tu d'aller prendre l'escalier, qui te mène a une porte aberrante ?
                   </label>
                </div>
                <div class="form-check"> 
                    <input class="form-check-input" type="radio" name="choix" id="flexRadioDefault2" value="pyramide">
                    <label class="form-check-label" for="flexRadioDefault2">
                   choisi tu d'aller prendre le couloir, qui te mène a un pont miteux ?
                    </label>
                </div>
            </div>
            <div class="mt-3 mb-5 text-center">
                <input class="btn btn-primary" type="submit" value="Valider">
            </div>
        </form>
    </div>
<?php include "html-footer.php" ?>
