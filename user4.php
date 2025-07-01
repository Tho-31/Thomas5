<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include 'UserClass.php';
$data = [
    0 => 'email',
    1 => 'first_name',
    2 => 'last_name',
    3 => 'password',
    4 => 'age',
];

$definition = [
    'email' => 0,
    'first_name' => 1,
    'last_name' => 2,
    'password' => 3,
    'age' => 4,
];

$data =  [
    0 => 'dj1963@orange.fr',
    1 => 'Denis',
    2 => 'JARDIN',
    3 => 'jedi!30',
    4 => '1963-05-06',
    
];

$row = 1;
if (($handle = fopen("users.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $user = new UserClass();
        $user->email = $data[$definition['email']];
        $user->firstName = $data[$definition['first_name']];
        $user->lastName = $data[$definition['last_name']];
        $user->password = $data[$definition['password']];
        $user->birthday = $data[$definition['age']];
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
 * dans cette version on déduit la position des champs de leur position désigné dans la première ligne
 * on lit donc la première ligne, on obtiend le tableau qui correspond a la position des des different champ
 * 
 * $data = [
 *  0 = 'email'
 *  1 => 'first_name'
 *  ...
 * 
 * 
 * donc la colonne 0 contient les email
 * 
 * on inverse le tableau
 * 
 * $definition = [
 *  'email' => 0
 *  'first_name' => 1 
 *   ....
 * 
 * $data = [
 *  0 = 'dj1963@orange.fr'
 *  1 => 'Denis'
 *  ...
 * 
 * $user->email = $data[$definition['email']];
 * 
 */



     