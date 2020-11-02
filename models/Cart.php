<?php

use Cart\Cart;

$cart = new Cart();

if (isset($_POST['remove'])) {
    $cart->removeItem($_POST['remove'][0]);
}
