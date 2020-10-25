<?php

use Cart\Cart;
use Sales\Sales;

// echo 'Printing POST from cart.php';
// echo '<pre>';
// echo print_r($_POST);
// echo '</pre>';

// echo 'Printing SESSION from cart.php';
// echo '<pre>';
// echo var_dump($_SESSION);
// echo '</pre>';

echo 1 . '<br>';

// TODO: get cart from DB if logged in, else get from session
$cart = new Cart();

// echo 'Printing cart from cart.php';
// echo '<pre>';
// echo print_r($cart);
// echo '</pre>';

echo 2 . '<br>';

if (
    !empty($_POST['productId']) &&
    !empty($_POST['customerEmail']) &&
    !empty($cart->productId)
) {
    echo 3 . '<br>';

    $saleStatus = 1;

    $sales = new Sales(
        'New',
        $cart->productId,
        $cart->productName,
        $cart->productSize,
        $cart->productOrderQty,
        $cart->productPrice,
        $cart->productSubtotal,
        $cart->productTotal,
        $saleStatus
    );

    echo 4 . '<br>';

    $cart = new Cart();

    echo 5 . '<br>';
}

echo 6 . '<br>';

if (isset($_GET['saleId'])) {
    echo 7 . '<br>';
    $saleId = (int) $_GET['saleId'];

    $sales = new Sales($saleId, 0, 0, 0, 0, 0, 0, 0, 0);

    $cart = $sales->retrieveSaleRecord($saleId);

    // echo 'Printing cart from cart.php';
    // echo '<pre>';
    // echo print_r($cart);
    // echo '</pre>';
}

echo 8 . '<br>';
