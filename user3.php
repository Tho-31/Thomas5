<?php

include 'UserClass.php';

$row = 1;
if (($handle = fopen("users.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $user = new UserClass();
        $user->email = $data[0];
        $user->firstName = $data[1];
        $user->lastName = $data[2];
        $user->password = $data[3];
        $user->birthday = $data[4];
        $num = count($data);
        echo "<p> $num champs à la ligne $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}

/**
 * dans cette version on utilise la position dans le tableau pour affecter les champs à l'objet exemple
 * 
 * user->email = $data[0];
 */

