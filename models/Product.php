<?php

use Product\Product;

$productId = $_GET['id'];

$product = new Product($productId);

if (isset($_GET['id']) && isset($_GET['productOrderQty'])) {
    $_SESSION['cart']['productId'][]       = $productId;
    $_SESSION['cart']['productName'][]     = $product->productName;
    $_SESSION['cart']['productSize'][]     = $_GET['productSize'];
    $_SESSION['cart']['productOrderQty'][] = $_GET['productOrderQty'];
}
