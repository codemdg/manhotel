<?php

use Core\Utils\FlashBag;
use Core\Views\BlockBuilder;

BlockBuilder::startBlock("body_classes");
echo "text-center";
BlockBuilder::endBlock();

BlockBuilder::startBlock("main_classes");
echo "form-signin w-100 m-auto";
BlockBuilder::endBlock();

BlockBuilder::startBlock('additionnal_styles');
?>
<link href="<?= BASE_URL ?>/css/sign_in.css" rel="stylesheet" type="text/css">
<?php BlockBuilder::endBlock(); ?>

<?php BlockBuilder::startBlock("content"); ?>
<form method="post" action="/login">
	<img class="mb-4" src="images/logo.png" alt="" width="72" height="57">
	<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
	<?php
	if (FlashBag::isThereMessageBag()) {
		foreach (FlashBag::getMessages() as $message) {
			echo "<div class='text-danger'>" . $message . "</div>";
		}
	}
	?>
	<div class="form-floating">
		<input type="text" class="form-control" id="floatingInput" value="demo" name="username" placeholder="Tape your username">
		<label for="floatingInput">Username</label>
	</div>
	<div class="form-floating">
		<input type="password" name="password" class="form-control" id="floatingPassword" value="admin123" placeholder="Password">
		<label for="floatingPassword">Password</label>
	</div>

	<div class="checkbox mb-3">
		<label>
			<input type="checkbox" value="remember-me"> Remember me
		</label>
	</div>
	<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
	<p class="mt-5 mb-3 text-muted">&copy; 2025–2026</p>
</form>
<?php BlockBuilder::endBlock(); ?>
