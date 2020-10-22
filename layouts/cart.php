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

// TODO: get cart from DB if logged in, else get from session
$cart = new Cart($db);

// echo 'Printing cart from cart.php';
// echo '<pre>';
// echo print_r($cart);
// echo '</pre>';

// TODO: check condition
if (!empty($_POST['productId']) && !empty($_POST['customerEmail'])) {
    echo 'Making new Sales object<br><br>';

    $saleStatus = 1;

    $sales = new Sales(
        $db,
        $cart->productId,
        $cart->productName,
        $cart->productSize,
        $cart->productOrderQty,
        $cart->productPrice,
        $cart->productSubtotal,
        $cart->productTotal,
        $saleStatus
    );

    $cart = new Cart($db);

    echo 'Printing sales';
    echo '<pre>';
    echo var_dump($sales);
    echo '</pre>';
}

if (isset($_GET['saleId'])) {
    // $cart = new Sales();
}

?>

<!-- Featured items -->
<section class="cart">
    <h1>Your cart</h1>

    <?php if (count($cart->productId)) { ?>

        <!-- TODO: review form classes -->
        <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="form form__cart" name="confirmOrder" id="form__confirm-order">

            <table class="cart__content">

                <?php for ($i = 0; $i < count($cart->productId); $i++) { ?>

                    <!-- TODO: padding space etc, refer to docs -->
                    <tr class="cart__item">
                        <td class="cart__images">
                            <input type="checkbox" name="productId[<?= $cart->productId[$i] ?>]">
                        </td>
                        <td class="cart__images">
                            <a href="product.php?id=<?= $cart->productId[$i] ?>">
                                <img src="assets/img/products/<?= $cart->productId[$i] ?>.jpg" class="cart__image">
                                __IMG HERE__
                            </a>
                        </td>
                        <td class="cart__info">
                            <a href="product.php?id=<?= $cart->productId[$i] ?>">
                                <?= $cart->productName[$i] ?>
                            </a>
                            <br>
                            <!-- TODO: make dropdown from list of sizes -->
                            <input type="checkbox" name="productSize[<?= $cart->productId[$i] ?>]" hidden>
                            <?= $cart->productSize[$i] ?>
                            <br>
                            <input type="checkbox" name="productOrderQty[<?= $cart->productId[$i] ?>]" hidden>
                            <?= $cart->productOrderQty[$i] ?>
                        </td>
                        <td class="cart__subtotal">
                            <input type="checkbox" name="productSubtotal[<?= $cart->productId[$i] ?>]" hidden>
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
            <div class="form__email">
                Your email:
                <input type="email" name="customerEmail" class="form__email" id="form__email">
            </div>

            <!-- TODO: add modal for order confirmation -->
            <button class="cart--confirm" form="form__confirm-order" value="confirmOrder" type="submit">
                Confirm Order
            </button>
        </form>

    <?php } else { ?>
        <div class="text-center">
            <p>
                Your cart is empty.
            </p>
            <p>
                Go check out our featured listings!
            </p>
        </div>
    <?php } ?>

</section>
