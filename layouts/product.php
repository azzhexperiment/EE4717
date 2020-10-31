<!-- Featured items -->
<section class="product">
    <div class="product__grid">
        <aside class="product__gallery">
            <div class="product__img">
                <img class="img--fit" src="assets/img/products/<?= $productId ?>.jpg" alt="">
            </div>
        </aside>

        <div class="product__main">
            <h2 class="product__name"><?= $product->productName ?></h2>

            <p class="product__description"><?= $product->productDescription ?></p>

            <!-- TODO: review form classes -->
            <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="get" class="form" id="form__product">

                <input type="number" name="id" value="<?= $productId ?>" hidden required>

                <div class="product__price">
                    Price: $<?= $product->productPrice ?>
                </div>

                <?php if ($product->productSize !== 'N/A') { ?>
                    <div class="product__size">
                        Size:
                        <?php foreach ($product->productSize as $size) { ?>
                            <label>
                                <input type="radio" name="productSize" value="<?= $size ?>" required>
                                <?= $size ?>
                            </label>
                        <?php } ?>
                    </div>
                <?php } ?>

                <!-- // TODO: add stock qty  -->

                <div class="product__qty">
                    Qty:
                    <button type="button" id="product__qty--less" class="qty__selector">-</button>
                    <input type="number" name="productOrderQty" id="product__qty-input" value="0" min="1" required>
                    <button type="button" id="product__qty--more" class="qty__selector">+</button>
                </div>

                <!-- TODO: add modal for order confirmation -->
                <button class="cart--add" form="form__product" type="submit">Add to Cart</button>
            </form>
        </div>
    </div>
</section>
