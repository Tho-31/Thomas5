<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

include "init.php";
include "users.php";
include "html-header.php";

$nbUsers = count($users);
?>

<table class="table">
    <thead>
        <tr>
            <?php foreach ($headers as $k => $v) { ?>
                <th scope="col"><?php echo $v ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < $nbUsers; $i++) { ?>
            <tr>
                <?php foreach ($headers as $k => $v) { ?>
                    <?php if ($k == '#') { ?>
                        <th scope="row"><?php echo $i + 1; ?></th>
                    <?php } else { ?>
                        <?php
                        // verifie que l'utilisateur a une colone age
                        if ($k === 'age' && isset($users[$i][$k])) {
                          /*  $dob = new DateTime($users[$i][$k]);
                            var_dump($dob);
                            $now = new DateTime();
                            $age = $dob->diff($now)->y;*/
                            // time()
                            // date()
                            // strtotime()
                            echo "<td>{$age} ans</td>";
                        } else {
                            echo "<td>" . ($users[$i][$k] ?? '-') . "</td>";
                        }
                        ?>
                    <?php } ?>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "html-footer.php"; ?>
