<?php
include 'init.php';
// grille : 30 lignes x 20 colonnes
$rows = 30;
$cols = 20;

// coordonnées des cases de la "clé" (contour) — base sur ton image
$key_shape = [
    [3,8],[3,9],[3,10],[3,11],
    [4,7],[4,12],
    [5,6],[5,13],
    [6,6],[6,13],
    [7,7],[7,12],
    [8,8],[8,9],[8,10],[8,11],
    [9,9],[10,9],[11,9],[12,9],[13,9],
    [14,9],[15,9],[16,9],
    [17,9],[17,10],[17,11],
    [18,9],
    [19,9],[19,10],[19,11],[19,12]
];

// Fonction pour vérifier si une case est dans la clé
function is_key_cell($row, $col, $key_shape) {
    foreach ($key_shape as $cell) {
        if ($cell[0] === $row && $cell[1] === $col) return true;
    }
    return false;
}

// Vérification du formulaire
if (isPost()) {
    $errors = false;

    for ($i = 0; $i < $rows; $i++) { 
        for ($j = 0; $j < $cols; $j++) {
            $name = "cell_{$i}_{$j}";
            $checked = isset($_POST[$name]);

            if (is_key_cell($i, $j, $key_shape)) {
                if (!$checked) {
                    $errors = true;
                }
            } else {
                if ($checked) {
                    $errors = true;
                }
            }
        }
    }

    if ($errors) {
        header("Location: page10.php");
    } else {
        header("Location: page11.php");
    }
    exit;
}
?>

<?php include "html-header.php"; ?>
<div class="container">
    <img src="assets/images/cle-aventure.png" class="img-fluid full_div mt-5" alt="">
    <div class="border mt-3">
        <p class="mt-3 text-start p-3">
Tu as répondu avec sagesse, aventurier, et le pont t’a laissé passer. Mais ton épreuve ne fait que commencer. Te voici à présent dans une salle vaste et silencieuse, où le temps semble figé. La clé que tu cherches est ici, cachée dans les replis du passé, dissimulée parmi les ombres et les symboles anciens. Rien n’est laissé au hasard dans ce lieu. Chaque pierre, chaque fresque, chaque mécanisme peut être un indice… ou un piège. Ouvre l'œil, fais preuve d’ingéniosité — car sans cette clé, les secrets de la pyramide resteront à jamais scellés.
        </p>
    </div>
</div>    
<div class="container mt-5">
    <h2 class="mb-4 text-center">trouve la clé</h2>
    <form method="post">
        <div class="d-flex flex-column align-items-center">
            <?php for ($i = 0; $i < $rows; $i++): ?>
                <div class="d-flex">
                    <?php for ($j = 0; $j < $cols; $j++):
                        $name = "cell_{$i}_{$j}";
                        $is_key = is_key_cell($i, $j, $key_shape);
                    ?>
                        <div class="form-check m-1">
                            <input
                                class="form-check-input cell-box <?= $is_key ? 'key-hint' : '' ?>"
                                type="checkbox"
                                name="<?= $name ?>"
                                id="<?= $name ?>"
                            >
                        </div>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>
        </div>        
        <div class="text-center mt-4">
            <input type="submit" class="btn btn-primary" value="Valider">
        </div>
    </form>
</div>

<style>
.cell-box {
    width: 20px;
    height: 20px;
    cursor: pointer;
    background-color: #ccc;
    border: 1px solid #999;
}

.cell-box.key-hint {
    background-color: #eee; /* Couleur légèrement différente pour la clé */
}
</style>
<?php include "html-footer.php"; ?>