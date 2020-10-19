<!-- Featured items -->
<section class="contact">
    <!-- TODO: review form classes -->
    <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post" class="form form__contact" id="form__contact">

        <h1 class="contact__title">Contact Us</h1>

        <p class="contact__description">Got a question? Reach out to us via the form below!</p>

        <div class="contact__item">
            <div class="contact__field-name">
                <label for="contact__input-name">
                    <h3>Name</h3>
                </label>
            </div>
            <div class="contact__input">
                <input class="contact__input-field" type="text" name="contact__input-name" id="contact__input-name" required>
                <br>
                <span class="error" id="error__name"></span>
            </div>
        </div>

        <!-- Email -->
        <div class="contact__item">
            <div class="contact__field-name">
                <label for="contact__input-email">
                    <h3>E-mail</h3>
                </label>
            </div>
            <div class="contact__input">
                <input class="contact__input-field" type="email" name="contact__input-email" id="contact__input-email" required>
                <br>
                <span class="error" id="error__email"></span>
            </div>
        </div>

        <!-- Query type -->
        <div class="contact__item">
            <div class="contact__field-name">
                <label for="contact__input-type">
                    <h3>Query</h3>
                </label>
            </div>
            <div class="contact__input">
                <select class="contact__input-field" name="contact__input-type" id="contact__input-type" required>
                    <option value="general">General Enquiry</option>
                    <option value="complain">File a Complain</option>
                    <option value="customerservice">Customer Service</option>
                </select>
                <br>
                <span class="error" id="error__date"></span>
            </div>
        </div>

        <!-- Message body -->
        <div class="contact__item">
            <div class="contact__field-name">
                <label for="contact__input-message">
                    <h3>Experience</h3>
                </label>
            </div>
            <div class="contact__input">
                <textarea class="contact__input-field" name="contact__input-message" id="contact__input-message" required></textarea>
                <br>
                <span class="error" id="error__message"></span>
            </div>
        </div>


        <!-- TODO: add modal for order confirmation -->
        <div class="contact__item">
            <div class="contact__field-name">
            </div>
            <div class="contact__input">
                <input type="submit" value="Submit" class="contact__button" id="contact__submit">
                <br>
                <span class="error" id="error__submit"></span>
            </div>
        </div>

    </form>
</section>
