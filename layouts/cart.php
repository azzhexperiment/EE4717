<!-- Featured items -->
<section class="cart">
    <?php

    /**
     * Check if user is logged in.
     * If not, throw warning and stop.
     * Else, show cart information.
     */
    if (empty($_SESSION['customerId'])) {
        echo '<h1 class="cart__title">You are not logged in.</h1>';
        echo '<h2 class="cart__title"><a href="user.php">Login</a> to see your cart.</h2>';
    } else {
        echo '<h1 class="cart__title">Your cart</h1>';

        if (!isset($_GET['saleId'])) {
            include_once('cart/cart-new.php');
        } else {
            include_once('cart/cart-confirm.php');
        }
    }

    ?>
</section>
