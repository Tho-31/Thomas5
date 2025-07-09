<?php

function isPost() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function mySortBull($nombre) {
    $nb = count($nombre) - 1;
    $invertion = true;
    while ($invertion == true) {
        $invertion = false;
        $i = 0;
        while ($i < $nb) {
            // on test si il y a une invertion a faire
            if ($nombre [$i + 1] < $nombre [$i]) {
                $save = $nombre[$i + 1];
                $nombre[$i + 1] = $nombre[$i];
                $nombre[$i] = $save;
                $invertion = true;
            }

            $i = $i + 1;
        }
    }
    return $nombre;
}

function getAge($date) {
    $dob = new DateTime($date);
    $now = new DateTime();
    $age = $dob->diff($now)->y;

    return $age;
}

// time()
// date()
// strtotime()
function connectDb() {

    $host = "localhost";
    $dbname = "thomas";
    $username = "thomas";
    $password = "zorro";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Pour afficher les erreurs PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexion réussie";
        return $conn;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

?>
