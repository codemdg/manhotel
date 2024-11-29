<?php

use Core\Views\BlockBuilder;

$defaultView = "defaultAdmin.php";
$accounts = $accounts ?? [];
?>

<?php BlockBuilder::startBlock("content") ?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h1>List accounts</h1>
        </div>
        <div class="col-sm">
            <a href="<?= BASE_URL . "/admin/add-account" ?>" class="btn btn-outline-primary float-end"> <i class="fa-solid fa-user-plus"></i></a>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($accounts as $account) {
                ?>
                    <tr>
                        <td scope="row"><?= $account->id ?></td>
                        <td><?= $account->username ?></td>
                        <td><?= $account->email ?></td>
                        <td><?= $account->created_at ?></td>
                        <td></td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?php BlockBuilder::endBlock() ?>
