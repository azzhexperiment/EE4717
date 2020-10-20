<?php

use Cart\Cart;
// use Sales\Sales;

$_SESSION['cart']['productId']       = [123, 132, 222];
$_SESSION['cart']['productName']     = ['A', 'B', 'C'];
$_SESSION['cart']['productSize']     = ['S', 'S', 'US 8'];
$_SESSION['cart']['productOrderQty'] = [1, 2, 3];

// $_SESSION['cart'] = [
//     [123, 'A', 'S', 1],
//     [132, 'B', 'XS', 2],
//     [222, 'C', 'US 8', 1],
//     [12123, 'S', 'S', 1],
// ];

// TODO: get cart from DB if logged in, else get from session
// Init fresh cart at every new page visit
$cart = new Cart();

echo 'Printing cart';
echo '<pre>';
echo print_r($cart);
echo '</pre>';

// $sales = new Sales();

// $itemIds = implode(',', $cart->productId);

// if (isset($_POST)) {
//     // TODO: this goes to product page, not cart page
//     // Add item to cart
//     if (isset($_POST['buy'])) {
//         $cart->addToCart(
//             $_POST['buy']['productId'],
//             $_POST['buy']['productOrderQty'],
//             $_POST['buy']['productName']
//         );
//     }

//     // Remove an item from cart
//     if (isset($_POST['remove'])) {
//         $cart->removeItem($_POST['remove']);
//     }

//     // Empty the cart
//     if (isset($_POST['empty'])) {
//         $cart->emptyCart();
//     }

//     unset($_POST);
// }

// TODO: Get products

?>

<!-- Featured items -->
<section class="cart">
    <h1>Your cart</h1>

    <!-- TODO: review form classes -->
    <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post" class="form form__cart">

        <table class="cart__content">
            <?php for ($i = 0; $i < count($cart->productId); $i++) { ?>
                <!-- TODO: padding space etc, refer to docs -->
                <tr class="cart__item">
                    <!-- TODO: consider removing -->
                    <td><input type="checkbox">DO i really need this</td>
                    <td>__IMG HERE__</td>
                    <td>
                        <?= $cart->productName[$i] ?>
                        <br>
                        <!-- TODO: make dropdown -->
                        <?= $cart->productSize[$i] ?>
                        <br>
                        <?= $cart->productOrderQty[$i] ?>
                    </td>
                    <td>__SUBTOTAL__</td>
                </tr>
            <?php } ?>
            <tr class="cart__total">
                <td>total</td>
            </tr>
        </table>

        <!-- TODO: add modal for order confirmation -->
        <!-- <button class="cart--add" type="submit">Add to Cart</button> -->
    </form>
</section>
