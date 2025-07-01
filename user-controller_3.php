<?php
include "init.php";
include "users.php";
include "html-header.php";
// @todo réécrire uniquement en php sans mélange php et html
$nbUsers = count($users);
?>
<a href="add-user.php" class="btn btn-primary btn-sm">+ Nouvel utlisateur</a>
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
            <?php $user = $users[$i] ?>
            <tr>
                <?php foreach ($headers as $k => $v) { ?>
                    <?php if ($k == '#') { ?>
                        <th scope="row"><?php echo $i + 1; ?></th>
                    <?php } else if ($k === 'age' && isset($user['age'])) { ?>
                        <?php $age = getAge($user['age']) ?>
                        <td><?= $age ?> ans</td>
                    <?php } else { ?>
                        <td><?= $user[$k] ?? '-'?></td>
                    <?php } ?>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "html-footer.php"; ?>
