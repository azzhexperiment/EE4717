<!-- Sign up -->
<section class="signup">
    <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post" class="form form__user" id="form__user" data-id="signup">

        <h1 class="user__title">Sign up</h1>

        <input type="text" name="type" value="signup" hidden required>

        <!-- First Name -->
        <div class="signup__item">
            <div class="user__field-name">
                <label for="signup__input-name">
                    <span>First Name</span>
                </label>
            </div>
            <div class="signup__input">
                <input class="user__input-field" type="text" name="signup__input-first-name" id="signup__input-first-name" required>
                <br>
                <span class="error" id="error__first-name"></span>
            </div>
        </div>

        <!-- First Name -->
        <div class="signup__item">
            <div class="user__field-name">
                <label for="signup__input-name">
                    <span>Last Name</span>
                </label>
            </div>
            <div class="signup__input">
                <input class="user__input-field" type="text" name="signup__input-last-name" id="signup__input-last-name" required>
                <br>
                <span class="error" id="error__last-name"></span>
            </div>
        </div>

        <!-- Email -->
        <div class="signup__item">
            <div class="user__field-name">
                <label for="signup__input-email">
                    <span>E-mail</span>
                </label>
            </div>
            <div class="signup__input">
                <input class="user__input-field" type="email" name="signup__input-email" id="signup__input-email" required>
                <br>
                <span class="error" id="error__email"></span>
            </div>
        </div>

        <!-- Password 1 -->
        <div class="signup__item">
            <div class="user__field-name">
                <label for="signup__input-password-1">
                    <span>Password</span>
                </label>
            </div>
            <div class="signup__input">
                <input class="user__input-field" type="password" name="signup__input-password-1" id="signup__input-password-1" minlength="8" required>
                <br>
                <span class="error" id="error__password-1"></span>
            </div>
        </div>

        <!-- Password 2 -->
        <div class="signup__item">
            <div class="user__field-name">
                <label for="signup__input-password-2">
                    <span>Re-type Password</span>
                </label>
            </div>
            <div class="signup__input">
                <input class="user__input-field" type="password" name="signup__input-password-2" id="signup__input-password-2" minlength="8" required>
                <br>
                <span class="error" id="error__password-2"></span>
            </div>
        </div>

        <!-- Address #1 -->
        <div class="signup__item">
            <div class="user__field-name">
                <span>Address #1</span>
            </div>
            <div class="signup__input">
                <input class="user__input-field" type="text" name="signup__input-address-1" id="signup__input-address-1" required>
                <br>
                <span class="error" id="error__address-1"></span>
            </div>
        </div>

        <!-- Address #2 -->
        <div class="signup__item">
            <div class="user__field-name">
                <span>Address #2</span>
            </div>
            <div class="signup__input">
                <input class="user__input-field" type="text" name="signup__input-address-2" id="signup__input-address-2" required>
                <br>
                <span class="error" id="error__address-2"></span>
            </div>
        </div>

        <!-- Country -->
        <div class="signup__item">
            <div class="user__field-name">
                <span>Country</span>
            </div>
            <div class="signup__input">
                <input class="user__input-field" type="text" name="signup__input-country" id="signup__input-country" required>
                <br>
                <span class="error" id="error__country"></span>
            </div>
        </div>

        <!-- City -->
        <div class="signup__item">
            <div class="user__field-name">
                <span>City</span>
            </div>
            <div class="signup__input">
                <input class="user__input-field" type="text" name="signup__input-city" id="signup__input-city" required>
                <br>
                <span class="error" id="error__city"></span>
            </div>
        </div>

        <!-- Postal -->
        <div class="signup__item">
            <div class="user__field-name">
                <span>Postal</span>
            </div>
            <div class="signup__input">
                <input class="user__input-field" type="number" name="signup__input-postal" id="signup__input-postal" required>
                <br>
                <span class="error" id="error__postal"></span>
            </div>
        </div>

        <div class="signup__item">
            <div class="user__field-name">
            </div>
            <div class="signup__input text--right">
                <button type="submit" class="signup__button" id="signup__submit">
                    Sign up
                </button>
                <br>
                <span class="error" id="error__submit"></span>
            </div>
        </div>

    </form>

    <div class="text--center">
        <p>
            Already have an account?
            Click <a href="user.php">HERE</a> to login.
        </p>
    </div>
</section>
