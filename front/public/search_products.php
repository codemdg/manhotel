<?php

use App\AppLoader;
use App\SearchProduct;

require "../app/AppLoader.php";
AppLoader::register();

$searchProduct = new SearchProduct();
$products = $searchProduct->searchProduct("produit");

?>

<?php foreach ($products as $product) { ?>
    <tr>
        <th><?= $product['name'] ?></th>
        <td>Jacob</td>
        <td>Thornton</td>
    </tr>
<?php
}
?>
