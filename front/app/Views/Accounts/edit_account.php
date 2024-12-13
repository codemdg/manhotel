<?php

use App\DataTransferObjects\AccountDto;
use Core\Views\BlockBuilder;

$defaultView = "defaultAdmin.php";
BlockBuilder::startBlock('content');
$accountDto = $accountDto ?? new AccountDto();
?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h1>Edit account</h1>
        </div>
        <div class="col-sm"></div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="txt-email" class="form-label">Email address</label>
                        <input type="email" class="form-control" required name="txt_email" id="txt-email" value="<?= $accountDto->email ?>" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="txt-username">Username</label>
                        <input type="text" class="form-control" required name="txt_username" id="txt-username" value="<?= $accountDto->username ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-success">Save</button>
                    <a href="<?= BASE_URL . "/admin/list-accounts" ?>" class="btn btn-outline-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
BlockBuilder::endBlock();
?>
