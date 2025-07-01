<?php

include "init.php";

$nombre = [
    21,
    10,
    12,
    1,
    3,
    4,
    5,
];



$utilisateurs = [
    
    [
        'email' => 'dj1963@orange.fr',
        'prenom' => 'Denis',
        'nom' => 'JARDIN',
        'password' => 'jedi!30'
    ],
    
    [
        'email' => 'thomas@orange.fr',
        'prenom' => 'Thomas',
        'nom' => 'VIDAL',
        'password' => 'zorro!30114'
    ],
    
    
];
/*
  var_dump($nombre);
  $save = $nombre [1];
  $nombre [1] = $nombre [0];
  $nombre [0] = $save;
  var_dump($nombre);

  $i = 2;

  var_dump($nombre);
  $save = $nombre[$i + 1];
  $nombre[$i + 1] = $nombre[$i];
  $nombre[$i] = $save;
  var_dump($nombre);

  //for ($i = 0;$i <) {

  $i = 2;

  for ($i = 0; $i < 6; $i = $i + 1) {
  var_dump($nombre);
  $save = $nombre[$i + 1];
  $nombre[$i + 1] = $nombre[$i];
  $nombre[$i] = $save;
  var_dump($nombre);
  }
 */
        
$invertion = true;
while ($invertion == true){
    $invertion = false;
    $i = 0;
    while  ( $i < 6) {
        // on test si il y a une invertion a faire
        if ($nombre [$i + 1] < $nombre [$i]) {
            var_dump($nombre);
            $save = $nombre[$i + 1];
            $nombre[$i + 1] = $nombre[$i];
            $nombre[$i] = $save;
            var_dump($nombre);
            $invertion = true;
            
        }
        
        $i = $i + 1;
    }
}
var_dump($nombre);
/* for (; 1 == 1;){

  } */
/*
for ($invertion = true;$invertion == true;){
    $invertion = false;
    for ($i = 0; $i < 6; $i = $i + 1) {
        if ($nombre [$i + 1] < $nombre [$i]) {
            var_dump($nombre);
            $save = $nombre[$i + 1];
            $nombre[$i + 1] = $nombre[$i];
            $nombre[$i] = $save;
            var_dump($nombre);
            $invertion = true;
        }
    }
}
var_dump($nombre)
 * 
 */

var_dump($utilisateurs);