<!-- Featured items -->
<section class="cart">
    <h1>Your cart</h1>

    <?php

    if (!isset($_GET['saleId'])) {
        include_once('cart/cart-new.php');
    } else {
        include_once('cart/cart-confirm.php');
    }

    ?>

</section>
