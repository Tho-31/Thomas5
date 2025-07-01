<?php

include "init.php";
// cette ligne test que l'on revient dans la page php avec une requete http de method POST
// sachant qu'il existe 2 type requete GET ou POST
// la method GET ce produit quand on saisi URL (Uniform Resource Locator) dans un navigateur web,
// ainsi que 
// tout les lien dans une page avec l'element anchor <a href="URL"> lien <a/>
// la method POST ce produit lorsque on clic sur le bouton de type submit d'un formulaire
// il prend toutes les valeur contenue dans le formulaire sous forme input... 
/*
 * if (isPost()) {
 */
    /*if (!empty($_POST['choix'])) {
        $choix = htmlspecialchars($_POST['choix']);
        

          if ($choix === 'magasin') {
            
            header("Location: page6.php");
        } 
        elseif ($choix === 'pyramide') {
            
            header("Location: page7.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}*/
if (isPost()) {
    session_start();
    $correct_quest = "Explorer la pyramide du Pharaon et récupérer l'artefact sacré";
    $correct_name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Arthur';
    
    $valid_colors = ["rouge",
    "bleu",
    "vert",
    "jaune",
    "orange",
    "rose",
    "violet",
    "marron",
    "gris",
    "noir",
    "blanc",
    "beige",
    "turquoise",
    "cyan",
    "magenta",
    "indigo",
    "olive",
    "or",
    "argent",
    "bordeaux",
    "saumon",
    "ivoire",
    "lavande",
    "chocolat",
    "crème",
    "corail",
    "menthe",
    "kaki",
    "aubergine",
    "pêche",
    "bleu marine",
    "bleu ciel",
    "vert pomme",
    "vert forêt",
    "gris clair",
    "gris foncé",
    "jaune citron",
    "rouge cerise",
    "brun",
    "blanc cassé"];

    $answer_name = $_POST['question1'] ?? '';
    $answer_quest = $_POST['question2'] ?? '';
    $answer_color = strtolower(trim($_POST['question3'] ?? ''));

    if (
        $answer_name === $correct_name &&
        $answer_quest === $correct_quest &&
        in_array($answer_color, $valid_colors)
    ) {
        header("Location: page8.php");
    } else {
        header("Location: page9.php");
    }
    exit;
}


?>
<?php

$real_name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Arthur'; // valeur de secours


$fake_names = [
    'Lancelot', 'Gauvain', 'Perceval', 'Merlin', 'Galahad', 'Tristan', 'Hector', 'Yvain', 'Bohort',
    'Mordred', 'Agravain', 'Palamède', 'Kay', 'Bedivere', 'Lucan', 'Geraint', 'Lamorak', 'Erec',
    'Pellinore', 'Dagonet', 'Bran', 'Taliesin', 'Owain', 'Morholt', 'Rohand', 'Balin', 'Balan',
    'Elyan', 'Rience', 'Lot', 'Uther', 'Igraine', 'Nimue', 'Viviane', 'Morgause', 'Elaine', 'Isolde',
    'Leodegrance', 'Safir', 'Segwarides', 'Bagdemagus', 'Sagramore', 'Turquine', 'Lionel', 'Dinadan',
    'Colgrevance', 'Drystan', 'Alain', 'Bors', 'Caradoc', 'Devon', 'Fergus', 'Gerald', 'Hugh', 'Ivan',
    'Jareth', 'Kiran', 'Lior', 'Malric', 'Nash', 'Orin', 'Penn', 'Quint', 'Ronan', 'Soren', 'Talon',
    'Ulric', 'Varric', 'Wystan', 'Xander', 'Yorick', 'Zane', 'Aldric', 'Beric', 'Cedric', 'Darian',
    'Edric', 'Faelan', 'Gareth', 'Hadrian', 'Isambard', 'Joss', 'Kael', 'Lucien', 'Magnus', 'Niall',
    'Oberon', 'Percival', 'Quintus', 'Rurik', 'Seth', 'Theron', 'Uriah', 'Valen', 'Wyatt', 'Xenos',
    'Yvain', 'Zephyr'
];

/*
 * renvoie un nomebre aleatoire en 0 (prmier indice du tableau) et le dernier 
 * qui est en faite le nombre d'element dans le tableau -1.
 */
/*$random_position = rand(0, count($fake_names)-1); 
array_splice($fake_names, $random_position, 0, $real_name);

for($i=0;$i(count($fake_names)-1);$i++){
    $ret[$i]= $fake_names[$i];
}
vav_dump($ret);
exit;
 * 
 */
$random_position = rand(0, count($fake_names)-1);
$new_names = [];

for ($i = 0; $i <= count($fake_names); $i++) {
    if ($i == $random_position) {
        $new_names[] = $real_name;
    }

    if ($i < count($fake_names)) {
        $new_names[] = $fake_names[$i];
    }
}

$fake_names = $new_names;

?>
<?php



$real_quest = "Explorer la pyramide du Pharaon et récupérer l'artefact sacré";


$fake_quests = [
    "Sauver un village en détresse",
    "Affronter un dragon ancestral",
    "Découvrir la cité engloutie",
    "Trouver le trésor des pirates",
    "Déjouer les plans d'un sorcier maléfique",
    "Survivre dans la jungle impitoyable",
    "Piloter un vaisseau spatial vers Mars",
    "Recueillir les fragments d'une prophétie oubliée",
    "Infiltrer un château en pleine nuit"
];



$random_position = rand(0, count($fake_quests));
array_splice($fake_quests, $random_position, 0, $real_quest);




?>

<?php include "html-header.php" ?>
    <div class="container">
        <img src="pont-vieux.png" class="img-fluid full_div mt-5" alt="">
        <div class="border mt-3">
            <p class="mt-3 text-start p-3">Aventurier, te voilà face au pont sacré, suspendu au-dessus du vide et baigné de la lueur des torches. Avant de le franchir, un vieux gardien émerge de l’ombre, drapé dans des étoffes poussiéreuses, son regard aussi ancien que les murs qui vous entourent. Il te fixe, puis déclare d’une voix grave : « Trois questions, trois vérités. Réponds sans faillir, ou le pont te refusera le passage. » Le silence devient pesant. Chaque mot que tu prononceras décidera de ton sort. Réfléchis bien… car une erreur ici, c’est peut-être la fin de ton aventure.. </p>
        </div>
        <form method="post">
            <div class="mt-3">
<label class="form-label">Quelle est ton nom ?</label>
        <select class="form-select" name="question1" required>
            <option selected disabled>Choisis ton nom</option>
            <?php foreach ($fake_names as $name): ?>
                <option value="<?= htmlspecialchars($name) ?>"><?= htmlspecialchars($name) ?></option>
            <?php endforeach; ?>
        </select>             </div>
            <div class="mt-3">
        <label class="form-label">Quelle est ta quête ?</label>
        <select class="form-select" name="question2" required>
            <option selected disabled>Choisis ta quête</option>
            <?php foreach ($fake_quests as $quest): ?>
                <option value="<?= htmlspecialchars($quest) ?>"><?= htmlspecialchars($quest) ?></option>
            <?php endforeach; ?>
        </select>
            </div>
            <div class="mt-3">
    <label class="form-label">Quelle est ta couleur préférée ? (écris en minuscules)</label>
    <input class="form-control" type="text" name="question3" placeholder="ex: bleu" required>
            </div>
            <div class="mt-3 mb-5 text-center">
                <input class="btn btn-primary" type="submit" value="Valider">
            </div>
        </form>
    </div>
<?php include "html-footer.php" ?>
