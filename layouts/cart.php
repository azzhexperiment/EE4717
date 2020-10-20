<?php

use Cart\Cart;
use Cart\Sales;

$_SESSION['cart']['id']  = [123, 132, 222];
$_SESSION['cart']['qty'] = [1, 2, 3];

// TODO: get cart from DB if logged in, else get from session
// Init fresh cart at every new page visit
$cart = new Cart();
$sales = new Sales();

$itemIds = implode(',', $cart->id);

if (isset($_POST)) {
    // TODO: this goes to product page, not cart page
    // Add item to cart
    if (isset($_POST['buy'])) {
        $cart->addToCart(
            $_POST['buy']['productId'],
            $_POST['buy']['productOrderQty'],
            $_POST['buy']['productName']
        );
    }

    // Remove an item from cart
    if (isset($_POST['remove'])) {
        $cart->removeItem($_POST['remove']);
    }

    // Empty the cart
    if (isset($_POST['empty'])) {
        $cart->emptyCart();
    }

    unset($_POST);
}

// TODO: Get products

?>

<!-- Featured items -->
<section class="cart">
    <h1>Your cart</h1>

    <!-- TODO: review form classes -->
    <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post" class="form form__cart">

        <table class="cart__content">
            <?php foreach ($products as $product) { ?>
                <!-- TODO: padding space etc, refer to docs -->
                <tr class="cart__item">
                    <td><input type="checkbox"></td>
                    <td>img</td>
                    <td>
                        <?= $product['name'] ?>
                        <br>
                        <!-- TODO: make dropdown -->
                        <?= $product['size'] ?>
                        <br>
                        <?= $product['qty'] ?>
                    </td>
                    <td>subtotal from js</td>
                </tr>
            <?php } ?>
        </table>

        <!-- TODO: add modal for order confirmation -->
        <!-- <button class="cart--add" type="submit">Add to Cart</button> -->
    </form>
</section>
