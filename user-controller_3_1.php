<?php

include "init.php";
include "users.php";
include "html-header.php";
// @todo réécrire uniquement en php sans mélange php et html
$nbUsers = count($users);

echo '<table class="table"><thead><tr>';
foreach ($headers as $k => $v) {
    echo '<th scope="col">' . $v . '</th>';
}
echo '</tr></thead><tbody>';
for ($i = 0; $i < $nbUsers; $i++) {
    $user = $users[$i];
    echo '<tr>';
    foreach ($headers as $k => $v) {
        if ($k == '#') {
            echo '<th scope="row">' . ($i + 1) . '</th>';
        } else if ($k === 'age' && isset($user['age'])) {
            $age = getAge($user['age']);
            echo '<td>' . $age . ' ans</td>';
        } else {
            echo '<td>'. $user[$k] ?? '-'.'</td>';
        }
    }
    echo '</tr>';
}
echo '</tbody>
</table>';

 include "html-footer.php" 
?>