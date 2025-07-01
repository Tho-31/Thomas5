
<?php

/* Exemple : valeur uniquement */

$array = [1, 2, 3, 17];

foreach ($array as $value) {
    echo "Valeur courante de \$array: $value.<br/>";
}

/* Exemple : clé et valeur */

$array = [
    "un" => 1,
    "deux" => 2,
    "trois" => 3,
    "dix-sept" => 17
];

foreach ($array as $key => $value) {
    echo "\$array[$key] => $value.<br/>";
}

/* Exemple : tableaux clé-valeur multidimensionnels */
$grid = [];
$grid[0][0] = "a";
$grid[0][1] = "b";
$grid[1][0] = "y";
$grid[1][1] = "z";

foreach ($grid as $y => $row) {
    foreach ($row as $x => $value) {
        echo "Valeur à la position x=$x et y=$y : $value<br/>";
    }
}

/* Exemple : tableaux dynamiques */

foreach (range(1, 10000000) as $value) {
    echo "$value\n";
}

