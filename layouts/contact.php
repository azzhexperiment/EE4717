<!-- Featured items -->
<section class="contact">
    <h1 class="contact__name"><?= $contactName ?></h1>

    <p class="contact__description"><?= $contactDescription ?></p>

    <!-- TODO: review form classes -->
    <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post" class="form" id="form__contact">
        <!-- User name -->


        <!-- User email -->


        <!-- Query type -->


        <!-- Message body -->


        <!-- TODO: add modal for order confirmation -->
        <button class="contact--submit" type="submit">Submit</button>
    </form>
</section>
