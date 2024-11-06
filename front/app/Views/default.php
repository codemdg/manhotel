<?php

use Core\Views\BlockBuilder;

$bodyClasses = isset($bodyClasses) ? $bodyClasses : "";
$mainClasses = isset($mainClasses) ? $mainClasses : "";
$content = isset($content) ? $content : "";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="ManHotel">
    <meta name="generator" content="Hugo 0.104.2">
    <title>MANHOTEL</title>

    <link href="<?= BASE_URL ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= BASE_URL ?>/css/app.css" rel="stylesheet" type="text/css">

    <?php BlockBuilder::renderBlock("additionnal_styles", "") ?>
</head>

<body class="<?= BlockBuilder::renderBlock("body_classes", ""); ?>">
    <main class="<?= BlockBuilder::renderBlock("main_classes", ""); ?>">
        <?= BlockBuilder::renderBlock("content", ""); ?>
    </main>
    <script src="<?= BASE_URL ?>/vendor/bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="<?= BASE_URL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <?php BlockBuilder::renderBlock("additionnal_scripts", "") ?>
</body>

</html>
