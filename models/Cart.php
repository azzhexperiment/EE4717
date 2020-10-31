<?php

use Cart\Cart;

$cart = new Cart();

// TODO: think about how to handle item removal
// if (isset($_POST['remove__item'])) {
//     // Reset session to update confirmed cart
//     $_SESSION['productId']       = [];
//     $_SESSION['productSize']     = [];
//     $_SESSION['productOrderQty'] = [];

//     // TODO: validate for checked items only
//     // Repopulate items to buy
//     $_SESSION['productId']       = $_POST['productId'];
//     $_SESSION['productSize']     = $_POST['productSize'];
//     $_SESSION['productOrderQty'] = $_POST['productOrderQty'];
// }
