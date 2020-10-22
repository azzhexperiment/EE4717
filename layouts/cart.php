<?php

use Cart\Cart;
// use Sales\Sales;

// TODO: remove after testing
$_SESSION = [];
$_SESSION['cart']['productId']       = [123, 132, 222];
$_SESSION['cart']['productName']     = ['A', 'B', 'C'];
$_SESSION['cart']['productSize']     = ['S', 'S', 'US 8'];
$_SESSION['cart']['productOrderQty'] = [1, 2, 3];

$_SESSION['remove'] = 132;

// TODO: get cart from DB if logged in, else get from session
// Init fresh cart at every new page visit
$cart = new Cart($db);

echo 'Printing cart from cart.php';
echo '<pre>';
echo var_dump($cart);
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
                    <td class="cart__image">
                        <a href="product.php?id=<?= $cart->productId[$i] ?>">
                            <img src="assets/img/products/<?= $cart->productId[$i] ?>.jpg">
                            __IMG HERE__
                        </a>
                    </td>
                    <td>
                        <a href="product.php?id=<?= $cart->productId[$i] ?>">
                            <?= $cart->productName[$i] ?>
                        </a>
                        <br>
                        <!-- TODO: make dropdown -->
                        <?= $cart->productSize[$i] ?>
                        <br>
                        <?= $cart->productOrderQty[$i] ?>
                    </td>
                    <td>
                        <?= $cart->productSubtotal[$i] ?>
                        __SUBTOTAL__
                    </td>
                </tr>
            <?php } ?>
            <tr class="cart__total">
                <td>total $$$</td>
            </tr>
        </table>

        <!-- EMAIL -->

        <!-- TODO: add modal for order confirmation -->
        <input class="cart--add" type="submit" value="Confirm Order">
    </form>
</section>
