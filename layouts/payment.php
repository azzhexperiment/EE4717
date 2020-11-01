<?php if (empty($_GET['saleId'])) { ?>
    <!-- Payment -->
    <section class="payment">
        <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post" class="form form__payment" id="form__payment">

            <h1 class="payment__title">Payment Info</h1>

            <!-- Name -->
            <div class="payment__item">
                <div class="payment__field-name">
                    <span>Name on card</span>
                </div>
                <div class="payment__input">
                    <input class="payment__input-field" type="text" name="payment__input-name" id="payment__input-name" required>
                    <br>
                    <span class="error" id="error__name"></span>
                </div>
            </div>

            <!-- Card -->
            <div class="payment__item">
                <div class="payment__field-name">
                    <span>Credit Card no.</span>
                </div>
                <div class="payment__input">
                    <input class="payment__input-field" type="number" name="payment__input-cc" id="payment__input-cc" pattern="[0-9]{16}" minlength="16" maxlength="16" placeholder="XXXX XXXX XXXX XXXX" required>
                    <br>
                    <span class="error" id="error__cc"></span>
                </div>
            </div>

            <!-- Validity -->
            <div class="payment__item">
                <div class="payment__field-name">
                    <span>Validity</span>
                </div>
                <div class="payment__input">
                    <input class="payment__input-field" type="number" name="payment__input-validity-mm" id="payment__input-validity-mm" pattern="[0-9]{2}" min="1" max="12" maxlength="2" placeholder="MM" title="Please enter 2 digits and max 12" required>
                    <span class="error" id="error__validity-mm"></span>
                    /
                    <input class="payment__input-field" type="number" name="payment__input-validity-yy" id="payment__input-validity-yy" pattern="[0-9]{2}" min="0" max="99" maxlength="2" placeholder="YY" title="Please enter 2 digits" required>
                    <br>
                    <span class="error" id="error__validity-yy"></span>
                </div>
            </div>

            <!-- CVV -->
            <div class="payment__item">
                <div class="payment__field-name">
                    <span>CVV</span>
                </div>
                <div class="payment__input">
                    <input class="payment__input-field" type="number" name="payment__input-cvv" id="payment__input-cvv" pattern="[0-9]{3,4}" minlength="3" maxlength="4" title="Please enter max 4 digits" required>
                    <span class="error" id="error__cvv"></span>
                </div>
            </div>

            <h1 class="payment__title">Shipping Address</h1>

            <!-- Receipient -->
            <div class="payment__item">
                <div class="payment__field-name">
                    <span>Receipient</span>
                </div>
                <div class="payment__input">
                    <input class="payment__input-field" type="text" name="payment__input-receipient" id="payment__input-receipient" required>
                    <br>
                    <span class="error" id="error__receipient"></span>
                </div>
            </div>

            <!-- Address #1 -->
            <div class="payment__item">
                <div class="payment__field-name">
                    <span>Address #1</span>
                </div>
                <div class="payment__input">
                    <input class="payment__input-field" type="text" name="payment__input-address-1" id="payment__input-address-1" required>
                    <br>
                    <span class="error" id="error__address-1"></span>
                </div>
            </div>

            <!-- Address #2 -->
            <div class="payment__item">
                <div class="payment__field-name">
                    <span>Address #2</span>
                </div>
                <div class="payment__input">
                    <input class="payment__input-field" type="text" name="payment__input-address-2" id="payment__input-address-2" required>
                    <br>
                    <span class="error" id="error__address-2"></span>
                </div>
            </div>

            <!-- Country -->
            <div class="payment__item">
                <div class="payment__field-name">
                    <span>Country</span>
                </div>
                <div class="payment__input">
                    <input class="payment__input-field" type="text" name="payment__input-country" id="payment__input-country" value="Singapore" required>
                    <br>
                    <span class="error" id="error__country"></span>
                </div>
            </div>

            <!-- City -->
            <div class="payment__item">
                <div class="payment__field-name">
                    <span>City</span>
                </div>
                <div class="payment__input">
                    <input class="payment__input-field" type="text" name="payment__input-city" id="payment__input-city" value="Singapore" required>
                    <br>
                    <span class="error" id="error__city"></span>
                </div>
            </div>

            <!-- Postal -->
            <div class="payment__item">
                <div class="payment__field-name">
                    <span>Postal</span>
                </div>
                <div class="payment__input">
                    <input class="payment__input-field" type="number" minlength="5" maxlength="6" name="payment__input-postal" id="payment__input-postal" required>
                    <br>
                    <span class="error" id="error__postal"></span>
                </div>
            </div>

            <div class="payment__item">
                <div class="payment__field-name">
                </div>
                <div class="payment__input text--right">
                    <button type="submit" class="payment__button" id="payment__submit">
                        Confirm
                    </button>
                    <br>
                    <span class="error" id="error__submit"></span>
                </div>
            </div>

            <input type="text" name="confirm" value="confirm" hidden required>

        </form>
    </section>

<?php } else { ?>
    You have no payment pending.
<?php } ?>
