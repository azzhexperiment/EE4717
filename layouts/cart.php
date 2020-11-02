<!-- Featured items -->
<section class="cart">
    <?php

    /**
     * Check if user is logged in.
     * If not, throw warning and stop.
     * Else, show cart information.
     */

    if (empty($_SESSION['customerId'])) {
        echo '<h1 class="cart__title">You are not logged in.</h1>';
        echo '<h2 class="cart__title"><a href="user.php">Login</a> to see your cart.</h2>';
    } else {
        if (count($cart->productId)) {
    ?>
            <h1 class="cart__title">Your cart</h1>

            <form action="payment.php" method="POST" class="form form__cart" name="confirmOrder" id="form__confirm-order">

                <table class="cart__content">

                    <input type="text" name="buy" value="buy" required hidden>

                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Details</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php for ($i = 0; $i < count($cart->productId); $i++) { ?>

                            <input type="number" name="productId[]" value="<?= $cart->productId[$i] ?>" required hidden>

                            <tr class="cart__item">

                                <td class="cart__images">
                                    <a href="product.php?id=<?= $cart->productId[$i] ?>">
                                        <img class="img--fit cart__image" src="assets/img/products/<?= $cart->productId[$i] ?>.jpg">
                                    </a>
                                </td>

                                <td class="cart__info">
                                    <a href="product.php?id=<?= $cart->productId[$i] ?>">
                                        <span class="text--uppercase">
                                            <?= $cart->productName[$i] ?>
                                        </span>
                                    </a>

                                    <br>

                                    <input type="text" name="productSize[]" value="<?= $cart->productSize[$i] ?>" required hidden>
                                    <?php if ($cart->productSize[$i]) { ?>
                                        Size:
                                        <?= $cart->productSize[$i] ?>
                                    <?php } ?>

                                    <br>

                                    <div class="product__qty">
                                        Qty:
                                        <button type="button" data-type="less" data-id="<?= $i ?>" class="qty__selector">
                                            -
                                        </button>

                                        <input type="number" name="productOrderQty[]" value="<?= $cart->productOrderQty[$i] ?>" min="1" id="product__qty-input-<?= $i ?>" required>

                                        <button type="button" data-type="more" data-id="<?= $i ?>" class="qty__selector">
                                            +
                                        </button>
                                    </div>
                                </td>

                                <td class="cart__subtotal">
                                    $<?= $cart->productSubtotal[$i] ?>
                                </td>

                                <td class="cart__remove">
                                    <input type="radio" name="remove[]" id="button__remove-<?= $i ?>" value="<?= $cart->productId[$i] ?>" hidden>
                                    <img src="assets/img/common/bin.png" data-type="remove" data-id="<?= $i ?>" class="bin">
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <!-- // TODO: Update on select -->
                    <tfoot>
                        <tr class="cart__total align--right">
                            <td colspan="4" class="text--right">
                                <b>Total: </b>$<?= $cart->productTotal ?>
                            </td>
                        </tr>
                        <tr class="cart__total align--right">
                            <td colspan="4" class="text--right">
                                <button class="cart--confirm" form="form__confirm-order" value="confirmOrder" type="submit">
                                    Confirm Order
                                </button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>

        <?php } else { ?>
            <h1 class="cart__title">Your cart</h1>
            <div class="text-center">
                <p>Your cart is empty.</p>
                <p>Go check out our featured listings!</p>
            </div>
    <?php }
    } ?>

</section>
