<?php

/*
 * fonction tri_cocktail (array liste)
  échangé := vrai
  Répéter tant que échangé
    échangé := faux


    Répéter pour tout  i entre 0 et liste.taille - 2
        si liste[i] > liste[i + 1]
            [[Echanger (liste[i], liste[i+1])
            échangé := vrai
        fin si
    fin Répéter
    Répéter pour tout  i (décroissant) entre liste.taille-2 et 0
        si liste[i] > liste[i + 1]
            [[Echanger (liste[i], liste[i+1])
            échangé := vrai
        fin si
    fin Répéter
  fin tant que
  fin fonction
 */
$a = [8, 5, 3, 9, 23, 1, 4, 85];



$echange = true;
$f = count($a);
for ($p = 0; $p < $f; $p++) { // mettre un while(condition) === for(;condition;) 

    for ($i = 0; $i < $f - 1; $i++) {
        if ($a[$i] > $a[$i + 1]) {
            $b = $a[$i];
            $a[$i] = $a[$i + 1];
            $a[$i + 1] = $b;
            $echange = true;
        }

    }

    for ($i = $f -2; $i >= 0; $i--) {
        if ($a[$i] > $a[$i + 1]) {
            $b = $a[$i];
            $a[$i] = $a[$i + 1];
            $a[$i + 1] = $b;
            $echange = true;
        }
    }
}
foreach ($a as $v) {
    
echo $v;
}
