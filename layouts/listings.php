<!-- Featured items -->
<section class="listings">
    <div class="listings__main">

        <h1 class="listings__title">Catalogue</h1>

        <div class="listings__grid">
            <?php foreach ($listings as $listing) { ?>
                <div class="listing__item">
                    <a href="product.php?id=<?= $listing->product_id ?>">
                        <!-- // TODO: generate URLs from DB -->
                        <img class="img--fit" src="assets/img/products/<?= $listing->product_id ?>.jpg" alt="">

                        <div class="listing__name"><?= $listing->product_name ?></div>

                        <!-- // TODO: consider removing this since cannot choose details -->
                        <!-- <button class="cart--add">Add to Cart</button> -->
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
