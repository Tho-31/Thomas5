<?php
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
                <th scope="row"><?php echo $i + 1; ?></th>
                <td><?php echo ($users[$i]['last_name']); ?></td>
                <td><?php echo ($users[$i]['first_name']); ?></td>
                <td><?php echo ($users[$i]['email']); ?></td>
                <td><?php echo ($users[$i]['password']); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "html-footer.php"; ?>
