<?php include "html-header.php"; ?>

<section class="container mt-5">
        <h2>ajouter un nouvel utilisateur</h2>
    <form>
        <fieldset>
            <legend>Informations personnelles</legend>
                        <label for="last_name" class="form-label">Nom de famille</label><br>
            <input type="text" class="form-control mb-3" id="last_name" name="last_name" required><br>
            
            <label for="last_name" class="form-label">Prénom</label><br>
            <input type="text" class="form-control mb-3" id="first_name" name="first_name" required><br>
            
                        <label for="last_name" class="form-label">Email</label><br>
            <input type="text" class="form-control mb-3" id="email" name="email" required><br>

            <label for="last_name" class="form-label">Mot de passe</label><br>
            <input type="text" class="form-control mb-3" id="password" name="password" required><br>

            <label for="last_name" class="form-label">Date de naissance</label><br>
            <input type="text" class="form-control mb-3" id="age" name="age" required><br>
            
        </fieldset>
                <button type="submit" class="btn btn-success">Enregistrer</button>

    </form>
</section>    