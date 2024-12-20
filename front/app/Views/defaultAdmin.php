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
    <title>MANHOTEL ADMIN</title>

    <link href="<?= BASE_URL ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= BASE_URL ?>/vendor/fontawesome-free-6.5.2-web/css/fontawesome.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>/vendor/fontawesome-free-6.5.2-web/css/brands.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>/vendor/fontawesome-free-6.5.2-web/css/solid.css" rel="stylesheet" />
    <?php BlockBuilder::renderBlock("additionnal_styles", "") ?>
</head>

<body class="<?= BlockBuilder::renderBlock("body_classes", ""); ?>">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Manhotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link <?= BlockBuilder::renderBlock("nav_active", "active"); ?>"
                            aria-current="page" title="Dashboard" href="#">
                            <i class="fa-solid fa-chart-line"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-user-shield"></i> Accounts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">
                            <i class="fa-solid fa-people-roof"></i> Employees
                        </a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="<?= BlockBuilder::renderBlock("main_classes", ""); ?>">
        <?= BlockBuilder::renderBlock("content", ""); ?>
    </main>
    <script src="<?= BASE_URL ?>/vendor/bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="<?= BASE_URL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <?php BlockBuilder::renderBlock("additionnal_scripts", "") ?>
</body>

</html>
