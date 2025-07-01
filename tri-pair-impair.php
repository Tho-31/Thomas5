<?php

/* 
 * pour (i = 1; i < list.length-1; i += 1)
      comparaisons impaires-paires : 
      pour (x = 1; x < list.length-1; x += 2)
        si list[x] > list[x+1]
          échanger list[x] et  list[x+1]
      comparaisons paires-impaires : 
      pour (x = 0; x < list.length-1; x += 2)
        si list[x] > list[x+1]
          échanger list[x] et  list[x+1]
 * 
 */
$a = [8, 5, 3, 9, 23, 1, 4, 85];
//$a = [8, 5];

$f = count($a);


for ($i = 1; $i < $f -1; $i +=1){
    for ($x = 1; $x < $f -1; $x +=2){
        if ($a[$x] > $a[$x +1]){
            $b = $a[$x];
            $a[$x] = $a[$x +1];
            $a[$x +1] = $b;        
        }
    }

    for ($x = 0; $x < $f -1; $x +=2){
        if ($a[$x] > $a[$x +1]){
            $b = $a[$x];
            $a[$x] = $a[$x +1];
            $a[$x +1] = $b;        
        }
    }
}

foreach ($a as $v) {
    echo $v;
}    