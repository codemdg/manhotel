<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caisse V1</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>caisse V1</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <form class="row g-3" id="form_search_product" method="post">
                    <div class="col-auto">
                        <label for="product_search" class="visually-hidden">Search product</label>
                        <input type="text" class="form-control" id="product_search" name="product_search" placeholder="Search a product">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                </form>

                <table class="table" id="product_table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Unit price</th>
                            <th scope="col">QT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include "search_products.php"; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h2>CLIENT</h2>
                <button type="button" class="btn btn-outline-secondary">Nouveau client</button>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="js/checkout.js"></script>
</body>

</html>
