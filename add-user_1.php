<?php
include "html-header.php";
include "users.php"; // Ce fichier doit contenir $headers
?>

<section class="container mt-5">
    <h2>Ajouter un nouvel utilisateur</h2>

    <form>

        <?php foreach ($headers as $key => $label): ?>
            <?php if ($key === '#') continue; ?> <!-- On ignore l'identifiant automatique -->

            <label for="<?= $key ?>" class="form-label"><?= $label ?></label><br>
            <input 
                type="text" 
                class="form-control mb-3" 
                id="<?= $key ?>" 
                name="<?= $key ?>" 
                required
            ><br>
        <?php endforeach; ?>

        <button type="submit" class="btn btn-success">Enregistrer</button>

    </form>
</section>

<?php include "html-footer.php"; ?>
