<?php
/*
 * algorithme tri a bulles 
 */

$a = "zirbvbibvaevavraviuoavvbev";
//tri_à_bulles_optimisé(Tableau T)
//    pour i allant de (taille de T)-1 à 1
//        tableau_trié ← vrai
//        pour j allant de 0 à i-1
//            si T[j+1] < T[j]
//                (T[j+1], T[j]) ← (T[j], T[j+1])
//                tableau_trié ← faux
//        si tableau_trié
//            fin tri_à_bulles_optimisé
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
   $j = $i;
}

  
echo $a;




// pour casser une boucle on utilise l'instruction break