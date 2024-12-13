<?php

use App\DataTransferObjects\AccountDto;

$accountDto = $accountDto ?? new AccountDto();

?>
<dl class="row">
    <dt class="col-sm-3">Account id</dt>
    <dd class="col-sm-9"><?= $accountDto->id ?></dd>

    <dt class="col-sm-3">Username</dt>
    <dd class="col-sm-9">
        <?= $accountDto->username ?>
    </dd>

    <dt class="col-sm-3">Email</dt>
    <dd class="col-sm-9"><?= $accountDto->email ?></dd>

    <dt class="col-sm-3 text-truncate">Created at</dt>
    <dd class="col-sm-9"><?= $accountDto->created_at ?></dd>
</dl>
