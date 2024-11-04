<?php

use Core\Responses\BlockBuilder;

include ROOT_APP . "/Views/default.php";

$block = new BlockBuilder();
$block->startBlock('additionnal_styles');
?>
<link href="<?= BASE_URL ?>/css/sign_in.css" rel="stylesheet" type="text/css">
<?php $block->endBlock(); ?>

<form method="post">
	<img class="mb-4" src="images/logo.png" alt="" width="72" height="57">
	<h1 class="h3 mb-3 fw-normal">Please sign in</h1>

	<div class="form-floating">
		<input type="text" class="form-control" id="floatingInput" value="demo" name="username" placeholder="Tape your username">
		<label for="floatingInput">Username</label>
	</div>
	<div class="form-floating">
		<input type="password" name="password" class="form-control" id="floatingPassword" value="demo" placeholder="Password">
		<label for="floatingPassword">Password</label>
	</div>

	<div class="checkbox mb-3">
		<label>
			<input type="checkbox" value="remember-me"> Remember me
		</label>
	</div>
	<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
	<a href="/" class="my-2 w-100 btn btn-lg btn-warning text-white" type="submit">
		<< Retour</a>
			<p class="mt-5 mb-3 text-muted">&copy; 2025–2026</p>
</form>
