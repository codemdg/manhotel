<?php
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
    <meta name="author" content="Top Info">
    <meta name="generator" content="Hugo 0.104.2">
    <title>MANHOTEL</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/app.css" rel="stylesheet" type="text/css">

    <link href="css/sign_in.css" rel="stylesheet" type="text/css">
</head>

<body class="<?= $bodyClasses ?>">
    <main class="<?= isset($mainClasses) ? $mainClasses : ""; ?>">
        <?= isset($content) ? $content : ""; ?>
    </main>
    <script src="../vendor/bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
