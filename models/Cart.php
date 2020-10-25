<?php

use Cart\Cart;
use Sales\Sales;

// TODO: get cart from DB if logged in, else get from session
$cart = new Cart();

if (
    !empty($_POST['productId']) &&
    !empty($_POST['customerEmail']) &&
    !empty($cart->productId)
) {
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

    $cart = new Cart();
}

if (isset($_GET['saleId'])) {
    $saleId = (int) $_GET['saleId'];

    $sales = new Sales($saleId, 0, 0, 0, 0, 0, 0, 0, 0);

    // TODO: add db
    $cart = $sales->retrieveSaleRecord($saleId);
}
