<?php

use App\AppLoader;
use App\SearchProduct;

require "../app/AppLoader.php";
AppLoader::register();

$searchProduct = new SearchProduct();
$products = $searchProduct->searchProduct($_POST['product_search']);

?>

<?php foreach ($products as $product) { ?>
    <tr>
        <th><?= $product['name'] ?></th>
        <td><?= $product['unit_price'] ?></td>
        <td>
            <input type="number" step="0.1" id="qt-<?= $product['id'] ?>" />
        </td>
        <td>
            <button type="button" data-id-product="<?= $product['id'] ?>" class="btn btn-success btn-add-product" title="Add product to checkout">=></button>

        </td>
    </tr>
<?php
}
?>
