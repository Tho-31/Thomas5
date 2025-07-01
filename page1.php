<?php
include "init.php";

if (isPost()) {
    if (!empty($_POST['choix'])) {
        $choix = htmlspecialchars($_POST['choix']);

        if ($choix === 'magasin') {
            
            header("Location: page2.php");
        } 
        elseif ($choix === 'pyramide') {
            
            header("Location: page3.php");
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
        <img src="assets/images/visage-aventurier.jpg" class="img-fluid full_div mt-5" alt="">
        <div class="border mt-3">
            <p class="mt-3 text-start p-3">Bonjour <?php echo $_SESSION['name'] ?>,

bienvenue dans cette quête extraordinaire à travers les mystères de la jungle ancienne et les secrets enfouis de la pyramide oubliée. Vous vous tenez à l'aube d'une aventure qui mettra à l'épreuve votre courage, votre sagacité et votre esprit d'exploration.

Chaque choix que vous ferez façonnera votre destin et déterminera si vous découvrirez des richesses insondables ou si vous serez confrontés à des défis inattendus. Souvenez-vous, chaque passage, chaque artefact, et chaque rencontre a son importance.

Que votre curiosité soit votre guide et votre détermination, votre force. Préparez-vous à plonger dans l'inconnu, à résoudre des énigmes ancestrales et à vivre une expérience inoubliable.

Que l'aventure commence ! </p>
        </div>
        <form method="post">
            <div class="mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choix" id="flexRadioDefault1" value="magasin">
                   <label class="form-check-label" for="flexRadioDefault1">
                    veux tu aller au magasin ?
                   </label>
                </div>
                <div class="form-check"> 
                    <input class="form-check-input" type="radio" name="choix" id="flexRadioDefault2" value="pyramide">
                    <label class="form-check-label" for="flexRadioDefault2">
                   veux tu entrer dans le pyramide ?
                    </label>
                </div>
            </div>
            <div class="mt-3 mb-5 text-center">
                <input class="btn btn-primary" type="submit" value="Valider">
            </div>
        </form>
    </div>
<?php include "html-footer.php" ?>
