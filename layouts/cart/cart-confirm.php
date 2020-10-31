<form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="form form__cart" name="confirmOrder" id="form__confirm-order">

    <table class="cart__content">

        <?php for ($i = 0; $i < count($cart); $i++) { ?>
            <!-- TODO: padding space etc, refer to docs -->
            <tr class="cart__item">

                <td class="cart__images">
                    <a href="product.php?id=<?= $cart[$i]->product_id ?>">
                        <img class="image--fit" src="assets/img/products/<?= $cart[$i]->product_id ?>.jpg" class="cart__image">
                    </a>
                </td>

                <td class="cart__info">
                    <a href="product.php?id=<?= $cart[$i]->product_id ?>">
                        <?= $cart[$i]->product_name ?>
                    </a>

                    <br>

                    <!-- TODO: make dropdown from list of sizes -->
                    <input type="checkbox" name="productSize[<?= $cart[$i]->product_id ?>]" hidden>
                    Size:
                    <?= $cart[$i]->product_size ?>

                    <br>

                    <div class="product__qty">
                        Qty:
                        <button type="button" data-type="less" data-id="<?= $i ?>" class="qty__selector">
                            -
                        </button>

                        <input type="number" name="productOrderQty[<?= $cart[$i]->product_id ?>]" value="<?= $cart[$i]->sale_qty ?>" min="1" required>

                        <button type="button" data-type="more" data-id="<?= $i ?>" class="qty__selector">
                            +
                        </button>
                    </div>
                </td>

                <td class="cart__subtotal">
                    <input type="checkbox" name="productSubtotal[<?= $cart[$i]->product_id ?>]" hidden>
                    $<?= $cart[$i]->total ?>
                </td>
            </tr>
        <?php } ?>

        <!-- // TODO: Update on select -->
        <tr class="cart__total">
            <td>$<?= $cart[0]->sale_amount ?></td>
        </tr>
    </table>

    <!-- TODO: add modal for order confirmation -->
    <button class="cart--confirm" form="form__confirm-order" value="confirmOrder" type="submit">
        Buy
    </button>
</form>
