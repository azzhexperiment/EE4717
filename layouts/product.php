<!-- Featured items -->
<section class="product">
    <div class="product__grid">
        <aside class="product__gallery">
            <div class="product__img">
                <img class="img--fit" src="assets/img/products/<?= $productId ?>.jpg" alt="">
            </div>
        </aside>

        <div class="product__main">
            <h2 class="product__name text--uppercase"><?= $product->productName ?></h2>

            <p class="product__description"><?= $product->productDescription ?></p>

            <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="get" class="form" id="form__product">

                <input type="number" name="id" value="<?= $productId ?>" hidden required>

                <div class="product__price">
                    <b>Price:</b> $<?= $product->productPrice ?>
                    <br>
                </div>

                <?php if ($product->productSize !== 'N/A') { ?>
                    <div class="product__size">
                        <b>Size:</b>
                        <?php foreach ($product->productSize as $size) { ?>
                            <label>
                                <input type="radio" name="productSize" value="<?= $size ?>" required>
                                <?= $size ?>
                            </label>
                        <?php } ?>
                        <br>
                    </div>
                <?php } ?>

                <!-- // TODO: add stock qty  -->

                <div class="product__qty">
                    <b>Stock:</b> <?= $product->productInventory ?>
                    <br>
                </div>

                <div class="product__qty">
                    <b>Qty:</b>
                    <button type="button" id="product__qty--less" class="qty__selector">-</button>
                    <input type="number" name="productOrderQty" id="product__qty-input" value="0" min="1" required>
                    <button type="button" id="product__qty--more" class="qty__selector">+</button>
                </div>

                <button class="cart--add" form="form__product" type="submit">Add to Cart</button>
            </form>
        </div>
    </div>
</section>
