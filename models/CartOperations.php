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

echo 1;

// TODO: get cart from DB if logged in, else get from session
$cart = new Cart($db);

// echo 'Printing cart from cart.php';
// echo '<pre>';
// echo print_r($cart);
// echo '</pre>';

echo 2;

if (
    !empty($_POST['productId']) &&
    !empty($_POST['customerEmail']) &&
    !empty($cart->productId)
) {
    echo 3;

    $saleStatus = 1;

    $sales = new Sales(
        $db,
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

    echo 4;

    $cart = new Cart($db);

    echo 5;
} else {
    echo 'POST is empty';
}

echo 6;

if (isset($_GET['saleId'])) {
    echo 'hi';
    $saleId = (int) $_GET['saleId'];

    $cart = new Sales($db, $saleId, 0, 0, 0, 0, 0, 0, 0, 0);

    $cart->retrieveSaleRecord($db, 1);
}

echo 7;
