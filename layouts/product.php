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

        <form action="../models/addToCart.php" class="form__product">
            <!-- TODO: add price -->
            <p>
                Price: $<?= $productPrice ?>
            </p>

            <!-- TODO: add numbers -->

            <button class="cart--add">Add to Cart</button>
        </form>
    </div>
</section>
