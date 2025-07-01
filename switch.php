<?php

$a = "Denis";
$b = "Thomas";

$a1 = null;
$b1 = null;

$a1 = $a;
$b1 = $b;

$a = $b1;
$b = $a1;
 echo $a, PHP_EOL;
 echo $b, PHP_EOL;
 
 
 $c = null;
 
 $c = $a;
 $a = $b;
 $b = $c;
 
echo $a, PHP_EOL;
echo $b, PHP_EOL;
 
 
         

