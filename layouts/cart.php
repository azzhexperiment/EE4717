<!-- Featured items -->
<section class="cart">
    <h1>Your cart</h1>

    <?php

    if (!isset($_GET['saleId'])) {
        include_once('cart-new.php');
    } else {
        include_once('cart-confirm.php');
    }

    ?>

</section>
