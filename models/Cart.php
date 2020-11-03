<?php

/**
 * Create Cart for further processing.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

use Cart\Cart;

$cart = new Cart();

if (isset($_POST['remove'])) {
    $cart->removeItem($_POST['remove'][0]);
}
