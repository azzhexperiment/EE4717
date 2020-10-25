<!-- Featured items -->
<section class="product">
    <aside class="product__gallery">
        <div class="product__grid">
            <div class="product__img">
                <!-- TODO: generate images from DB -->
                <img class="img--fit" src="assets/img/index/featured-1.jpg" alt="">
            </div>
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
                <button type="button" id="product__qty--less">-</button>
                <input type="number" name="productOrderQty" id="product__qty-input" value="0" min="1" required>
                <button type="button" id="product__qty--more">+</button>
            </div>

            <!-- TODO: add modal for order confirmation -->
            <button class="cart--add" form="form__product" type="submit">Add to Cart</button>
        </form>
    </div>
</section>
