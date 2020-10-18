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
            <?php for ($i = 0; $i < $listingNum; $i++) { ?>
                <div class="card listing__item">
                    <!-- TODO: generate URLs from DB -->
                    <img class="img--fit" src="assets/img/index/featured-1.jpg" alt="">

                    <button class="cart--add">Add to Cart</button>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
