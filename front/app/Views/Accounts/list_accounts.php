<?php

use App\Utils\MhFlashBag;
use Core\Utils\UrlGenerator;
use Core\Views\BlockBuilder;

$defaultView = "defaultAdmin.php";
$accounts = $accounts ?? [];
?>

<?php BlockBuilder::startBlock("content") ?>
<div class="container">
    <p>
        <?php MhFlashBag::showSuccessfullMessages(); ?>
    </p>
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
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a href="<?= UrlGenerator::generate("/admin/edit-account?id=" . $account->id) ?>" role="button" class="btn btn-outline-secondary">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger"
                                    data-bs-title="Confirmation [DELETE]"
                                    data-bs-body="Are you sure to delete <?= $account->username ?> ?"
                                    data-bs-href-yes="<?= UrlGenerator::generate("/admin/delete-account?id=" . $account->id) ?>"
                                    data-bs-toggle="modal"
                                    data-bs-target="#confirm_action">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#detail_modal"
                                    data-bs-title="Detail account"
                                    data-url-account-detail="<?= UrlGenerator::generate("/admin/detail-account?id=" . $account->id) ?>">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?php BlockBuilder::endBlock() ?>
