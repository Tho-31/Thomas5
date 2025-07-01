<?php
/*
 * algorithme tri a bulles 
 */

$a = "zirbvbibvaevavraviuoavvbev";
// pour i allant de (taille de T)-1 à 1
//     pour j allant de 0 à i-1
//         si T[j+1] < T[j]
//             (T[j+1], T[j]) ← (T[j], T[j+1])
$c = strlen($a);
for ($i = $c -1; $i > 1; $i--) {
    for ($j = 0; $j < $i; $j++){
        if ($a[$j +1] < $a[$j]){
            
            $f = null;
            
            $f = $a[$j +1];
            $a[$j +1] = $a[$j];
            $a[$j] = $f;
        }
    }
}
echo $a, PHP_EOL;