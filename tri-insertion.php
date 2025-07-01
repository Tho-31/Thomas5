<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// procédure tri_insertion(tableau T)
//       pour i de 1 à taille(T) - 1
//            # mémoriser T[i] dans x
//            x ← T[i]                            
//          # décaler les éléments T[0]..T[i-1] qui sont plus grands que x, en partant de T[i-1]
//            j ← i                               
//            tant que j > 0 et T[j - 1] > x
//                     T[j] ← T[j - 1]
//                     j ← j - 1
//            # placer x dans le "trou" laissé par le décalage
//            T[j] ← x    
$a = [8, 5, 3, 9, 23, 1, 4, 85];

$c = count($a);

for ($i = 1; $i < $c; $i++) {
    $x = $a[$i];
    $j = $i;
    for (; $j > 0 && $a[$j - 1] > $x; $j--) {
        $a[$j] = $a[$j - 1];
    }
    $a[$j] = $x;
}
include ('html-header.php');
?>
<table class="table">
    <tbody>
        <tr>
        <?php foreach ($a as $v) { ?>
            <td>
                <?php echo $v; ?>
            </td>    
        <?php } ?>
        </tr>
    </tbody>
</table>
<?php

include ('html-footer.php');
