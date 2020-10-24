<!-- Login -->
<section class="login">
    <!-- // TODO: review form classes -->
    <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post" class="form form__user" id="form__user">

        <h1 class="login__title">Login</h1>

        <!-- Email -->
        <div class="login__item">
            <div class="user__field-name">
                <label for="login__input-email">
                    <span>E-mail</span>
                </label>
            </div>
            <div class="login__input">
                <input class="user__input-field" type="email" name="login__input-email" id="login__input-email" required>
                <br>
                <span class="error" id="error__email"></span>
            </div>
        </div>

        <!-- Password -->
        <div class="login__item">
            <div class="user__field-name">
                <label for="login__input-password">
                    <span>Password</span>
                </label>
            </div>
            <div class="login__input">
                <input class="user__input-field" type="password" name="login__input-password" id="login__input-password" minlength="8" required>
                <br>
                <span class="error" id="error__password"></span>
            </div>
        </div>

        <!-- // TODO: add modal for order confirmation -->
        <div class="login__item">
            <div class="user__field-name">
            </div>
            <div class="login__input text--right">
                <button type="submit" class="login__button" id="login__submit">
                    Login
                </button>
                <br>
                <span class="error" id="error__submit"></span>
            </div>
        </div>

    </form>

    <div class="text--center">
        <p>
            Have no account yet?
            Click <a href="user.php?action=signup">HERE</a> to create account.
        </p>
    </div>
</section>