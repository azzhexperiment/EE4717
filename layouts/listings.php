<!-- Featured items -->
<section class="listings">
    <aside class="listings__menu">
        <h1>Categories</h1>
        <ul class="style--none">
            <li>nav</li>
            <li>nav</li>
            <li>nav</li>
        </ul>
    </aside>

    <div class="listings__main">
        <div class="listings__grid">
            <?php foreach ($listings as $listing) { ?>
                <div class="card listing__item">
                    <a href="product.php?id=<?= $listing->product_id ?>">
                        <!-- TODO: generate URLs from DB -->
                        <img class="img--fit" src="assets/img/index/featured-1.jpg" alt="">

                        <div class="listing__name"><?= $listing->product_name ?></div>

                        <!-- TODO: consider removing this since cannot choose details -->
                        <!-- <button class="cart--add">Add to Cart</button> -->
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
