<?php if (count($cart->productId)) { ?>
    <!-- TODO: review form classes -->
    <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="form form__cart" name="confirmOrder" id="form__confirm-order">

        <table class="cart__content">

            <?php for ($i = 0; $i < count($cart->productId); $i++) { ?>
                <!-- TODO: padding space etc, refer to docs -->
                <tr class="cart__item">
                    <td class="cart__select">
                        <input type="checkbox" name="productId[<?= $cart->productId[$i] ?>]" checked>
                    </td>

                    <td class="cart__images">
                        <a href="product.php?id=<?= $cart->productId[$i] ?>">
                            <img src="assets/img/products/<?= $cart->productId[$i] ?>.jpg" class="cart__image">
                        </a>
                    </td>

                    <td class="cart__info">
                        <a href="product.php?id=<?= $cart->productId[$i] ?>">
                            <?= $cart->productName[$i] ?>
                        </a>

                        <br>

                        <!-- TODO: make dropdown from list of sizes -->
                        <input type="checkbox" name="productSize[<?= $cart->productId[$i] ?>]" hidden>
                        Size:
                        <?= $cart->productSize[$i] ?>

                        <br>

                        <div class="product__qty">
                            Qty:
                            <button type="button" data-type="less" data-id="<?= $i ?>" class="product__qty--less">
                                -
                            </button>

                            <input type="number" name="productOrderQty[<?= $cart->productId[$i] ?>]" value="<?= $cart->productOrderQty[$i] ?>" min="1" required>

                            <button type="button" data-type="more" data-id="<?= $i ?>" class="product__qty--more">
                                +
                            </button>
                        </div>
                    </td>

                    <td class="cart__subtotal">
                        <input type="checkbox" name="productSubtotal[<?= $cart->productId[$i] ?>]" hidden>
                        $<?= $cart->productSubtotal[$i] ?>
                    </td>
                </tr>
            <?php } ?>

            <!-- // TODO: Update on select -->
            <tr class="cart__total">
                <td>
                    $<?= $cart->productTotal ?>
                </td>
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
        <p>Your cart is empty.</p>
        <p>Go check out our featured listings!</p>
    </div>
<?php } ?>
