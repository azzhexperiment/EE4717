<!-- Featured items -->
<section class="cart">
    <h1 class="cart__title">Your cart</h1>

    <?php

    if (!isset($_GET['saleId'])) {
        include_once('cart/cart-new.php');
    } else {
        include_once('cart/cart-confirm.php');
    }

    ?>

</section>
