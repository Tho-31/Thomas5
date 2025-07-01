<?php

/* 
 *   procédure tri_selection(tableau t)
      n ← longueur(t) 
      pour i de 0 à n - 2
          min ← i       
          pour j de i + 1 à n - 1
              si t[j] < t[min], alors min ← j
          fin pour
          si min ≠ i, alors échanger t[i] et t[min]
      fin pour
  fin procédure
 * 
 */

$a = [8, 5, 3, 9, 23, 1, 4, 85];

$f = count ($a);

for ($i = 0; $i < $f -1; $i++) {
    $min = $i;
    for ($j = $i +1; $j < $f; $j++) {
        if ($a[$j] < $a[$min]) {
            $min = $j;
        }
    }
    if ($min != $i) {
        $b = $a[$i];
        $a[$i] = $a[$min];
        $a[$min] = $b;
    }
}

foreach ($a as $v) {
    echo $v;
}