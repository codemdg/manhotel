<?php

use Core\Responses\BlockBuilder;

$bodyClasses = isset($bodyClasses) ? $bodyClasses : "";
$mainClasses = isset($mainClasses) ? $mainClasses : "";
$content = isset($content) ? $content : "";
$block = new BlockBuilder();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Top Info">
    <meta name="generator" content="Hugo 0.104.2">
    <title>MANHOTEL</title>

    <link href="<?= BASE_URL ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= BASE_URL ?>/css/app.css" rel="stylesheet" type="text/css">

    <?php $block->renderBlock("additionnal_styles", "") ?>
</head>

<body class="<?= $bodyClasses ?>">
    <main class="<?= isset($mainClasses) ? $mainClasses : ""; ?>">
        <?= isset($content) ? $content : ""; ?>
    </main>
    <script src="<?= BASE_URL ?>/vendor/bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="<?= BASE_URL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <?php $block->renderBlock("additionnal_scripts", "") ?>
</body>

</html>
