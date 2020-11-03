<?php

if ($_GET['cat'] === 'male') {
    echo '<section class="splash male"></section>';
} elseif ($_GET['cat'] === 'female') {
    echo '<section class="splash female"></section>';
} elseif ($_GET['cat'] === 'featured') {
    echo '<section class="splash featured"></section>';
} elseif ($_GET['cat'] === 'new') {
    echo '<section class="splash new"></section>';
}

?>

<!-- Featured items -->
<section class="listings">
    <div class="listings__main">

        <h1 class="listings__title">Catalogue</h1>

        <div class="listings__grid">
            <?php foreach ($listings as $listing) { ?>
                <div class="listing__item">
                    <a href="product.php?id=<?= $listing->product_id ?>">
                        <img class="img--fit" src="assets/img/products/<?= $listing->product_id ?>.jpg" alt="">

                        <div class="listing__name text--uppercase"><?= $listing->product_name ?></div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
