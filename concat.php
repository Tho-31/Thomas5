<?php

/* substr 
 * 
 */
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$a = "abcdefghjzezefzefihzeiuhfizuezhfheiuzhf   feio";
$b = substr($a, 2, 1);
echo $b;
echo PHP_EOL;
echo $a;
echo PHP_EOL;

echo 'abcdef', PHP_EOL;
echo 'bcdefa', PHP_EOL;
echo 'cdefab', PHP_EOL;
echo 'defabc', PHP_EOL;
echo 'efabcd', PHP_EOL;
echo 'fabcde', PHP_EOL;
echo '------', PHP_EOL;

$a1 = null;
$b1 = null;
$c1 = null;

$c = strlen($a);
for ($i = 0; $i < $c; $i++) {
    echo $a, PHP_EOL;
    // on prend la premier lettre et on la met derriere
    // on prend la premeir lettre et on la met de cote dans une variable $a1
    $a1 = substr($a,0,1);
    // on prend toute les autre lettre et on les met dans une variable $b1
    $b1 = substr($a,1,$c-1);
    // et on concataine $b1 avec $a1 que l'on met dans une variable $c1
    $c1 = $b1 . $a1;
    $a = $c1;
}

