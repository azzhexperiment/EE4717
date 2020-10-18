<!-- Featured items -->
<section class="product">
    <aside class="product__gallery">
        <div class="product__grid">

            <?php for ($i = 0; $i < $imageNum; $i++) { ?>

                <div class="product__img">
                    <!-- TODO: generate images from DB -->
                    <img class="img--fit" src="../assets/img/index/featured-1.jpg" alt="">
                </div>

            <?php } ?>

        </div>
    </aside>

    <div class="product__main">
        <h2 class="product__name"><?= $productName ?></h2>

        <p class="product__description"><?= $productDescription ?></p>

        <!-- TODO: review form classes -->
        <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post" class="form" id="form__product">
            <div class="product__price">
                Price: $<?= $productPrice ?>
            </div>

            <div class="product__qty">
                Qty:
                <button id="product__qty--less">-</button>
                <input type="number" name="product__qty-input" id="product__qty-input" value="0" min="0">
                <button id="product__qty--more">+</button>
            </div>

            <!-- TODO: add modal for order confirmation -->
            <button class="cart--add" type="submit">Add to Cart</button>
        </form>
    </div>
</section>
