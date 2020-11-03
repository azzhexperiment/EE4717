<?php

/**
 * Create Cart for further processing.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

use Cart\Cart;

$removeSuccess = '<script>
    alert("Item removed")
    window.location = "http://192.168.56.2/f37ee/project/cart.php"
</script>';

$cart = new Cart();

if (isset($_POST['remove'])) {
    $cart->removeItem($_POST['remove'][0]);

    unset($_POST['remove']);
    echo $removeSuccess;
}
