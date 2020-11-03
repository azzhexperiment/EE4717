/**
 * Validate payment info.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.2.1
 */

'use strict'

const form = document.getElementById('form__payment')

const paymentName = document.getElementById('payment__input-name')
const paymentCC = document.getElementById('payment__input-cc')
const paymentMM = document.getElementById('payment__input-validity-mm')
const paymentYY = document.getElementById('payment__input-validity-yy')
const paymentCVV = document.getElementById('payment__input-cvv')
const paymentRecipient = document.getElementById('payment__input-recipient')
const paymentAddress1 = document.getElementById('payment__input-address-1')
const paymentAddress2 = document.getElementById('payment__input-address-2')
const paymentCountry = document.getElementById('payment__input-country')
const paymentCity = document.getElementById('payment__input-city')
const paymentPostal = document.getElementById('payment__input-postal')
const paymentSubmitButton = document.getElementById('payment__submit')

const errorName = document.getElementById('error__name')
const errorCC = document.getElementById('error__cc')
const errorMM = document.getElementById('error__validity-mm')
const errorYY = document.getElementById('error__validity-yy')
const errorCVV = document.getElementById('error__cvv')
const errorRecipient = document.getElementById('error__recipient')
const errorAddress1 = document.getElementById('error__address-1')
const errorAddress2 = document.getElementById('error__address-2')
const errorCountry = document.getElementById('error__country')
const errorCity = document.getElementById('error__city')
const errorPostal = document.getElementById('error__postal')
const errorSubmit = document.getElementById('error__submit')

// Error control for <payment.name> field.
paymentName.addEventListener('blur', () => {
  if (paymentName.value === '') {
    errorName.textContent = 'This field is compulsory!'
  } else if (isValidText(paymentName.value)) {
    errorName.textContent = ''
  } else {
    errorName.textContent = 'Enter characters and whitespaces only!'
  }
})

// Error control for <payment.CC> field.
paymentCC.addEventListener('blur', () => {
  if (paymentCC.value === '') {
    errorCC.textContent = 'This field is compulsory!'
  } else if (isValidCC(paymentCC.value)) {
    errorCC.textContent = ''
  } else {
    errorCC.textContent = 'Enter 16 digits!'
  }
})

// Error control for <payment.MM> field.
paymentMM.addEventListener('blur', () => {
  if (paymentMM.value === '') {
    errorMM.textContent = 'These fields are compulsory!'
  } else if (isValidMM(paymentMM.value)) {
    errorMM.textContent = ''
  } else {
    errorMM.textContent = 'Enter 00 - 12!'
  }
})

// Error control for <payment.YY> field.
paymentYY.addEventListener('blur', () => {
  if (paymentYY.value === '') {
    errorYY.textContent = 'These fields are compulsory!'
  } else if (isValidYY(paymentYY.value)) {
    errorYY.textContent = ''
  } else {
    errorYY.textContent = 'Enter 00 - 99!'
  }
})

// Error control for <payment.CVV> field.
paymentCVV.addEventListener('blur', () => {
  if (paymentCVV.value === '') {
    errorCVV.textContent = 'This field is compulsory!'
  } else if (isValidCVV(paymentCVV.value)) {
    errorCVV.textContent = ''
  } else {
    errorCVV.textContent = 'Enter 3 or 4 digit PIN!'
  }
})

// Error control for <payment.recipient> field.
paymentRecipient.addEventListener('blur', () => {
  if (paymentRecipient.value === '') {
    errorRecipient.textContent = 'This field is compulsory!'
  } else if (isValidText(paymentRecipient.value)) {
    errorRecipient.textContent = ''
  } else {
    errorRecipient.textContent = 'Enter characters and whitespaces only!'
  }
})

// Error control for <payment.address1> field.
paymentAddress1.addEventListener('blur', () => {
  if (paymentAddress1.value === '') {
    errorAddress1.textContent = 'This field is compulsory!'
  } else if (isValidAddress(paymentAddress1.value)) {
    errorAddress1.textContent = ''
  } else {
    errorAddress1.textContent = 'Enter characters, numbers and whitespaces only!'
  }
})

// Error control for <payment.address2> field.
paymentAddress2.addEventListener('blur', () => {
  if (paymentAddress2.value === '') {
    errorAddress2.textContent = 'This field is compulsory!'
  } else if (isValidAddress(paymentAddress2.value)) {
    errorAddress2.textContent = ''
  } else {
    errorAddress2.textContent = 'Enter characters, numbers and whitespaces only!'
  }
})

// Error control for <payment.country> field.
paymentCountry.addEventListener('blur', () => {
  if (paymentCountry.value === '') {
    errorCountry.textContent = 'This field is compulsory!'
  } else if (isValidText(paymentCountry.value)) {
    errorCountry.textContent = ''
  } else {
    errorCountry.textContent = 'Enter characters and whitespaces only!'
  }
})

// Error control for <payment.city> field.
paymentCity.addEventListener('blur', () => {
  if (paymentCity.value === '') {
    errorCity.textContent = 'This field is compulsory!'
  } else if (isValidText(paymentCity.value)) {
    errorCity.textContent = ''
  } else {
    errorCity.textContent = 'Enter characters and whitespaces only!'
  }
})

// Error control for <payment.postal> field.
paymentPostal.addEventListener('blur', () => {
  if (paymentPostal.value === '') {
    errorPostal.textContent = 'This field is compulsory!'
  } else if (isValidPostal(paymentPostal.value)) {
    errorPostal.textContent = ''
  } else {
    errorPostal.textContent = 'Enter 5 or 6 digits only!'
  }
})

// Validate everything before submission to double check.
paymentSubmitButton.addEventListener('click', (event) => {
  event.preventDefault()

  if (!isValidText(paymentName.value) ||
    !isValidCC(paymentCC.value) ||
    !isValidMM(paymentMM.value) ||
    !isValidYY(paymentYY.value) ||
    !isValidCVV(paymentCVV.value) ||
    !isValidText(paymentRecipient.value) ||
    !isValidAddress(paymentAddress1.value) ||
    !isValidAddress(paymentAddress2.value) ||
    !isValidText(paymentCountry.value) ||
    !isValidText(paymentCity.value) ||
    !isValidPostal(paymentPostal.value)) {
    errorSubmit.textContent = 'Fields contain invalid data!'
  } else {
    paymentName.value = paymentName.value.trim()
    paymentCC.value = paymentCC.value.trim()
    paymentMM.value = paymentMM.value.trim()
    paymentYY.value = paymentYY.value.trim()
    paymentCVV.value = paymentCVV.value.trim()
    paymentRecipient.value = paymentRecipient.value.trim()
    paymentAddress1.value = paymentAddress1.value.trim()
    paymentAddress2.value = paymentAddress2.value.trim()
    paymentCountry.value = paymentCountry.value.trim()
    paymentCity.value = paymentCity.value.trim()
    paymentPostal.value = paymentPostal.value.trim()

    form.submit()
  }
})

/**
 * Validates a text.
 *
 * A text contains alphabet characters and character spaces only.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value
 *
 * @constant {RegExp} rule Regex rule for text validation
 *
 * @returns {Boolean}
 */
function isValidText (value) {
  const rule = /^[a-zA-Z ]+$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates a credit card number.
 *
 * A CC number contains 16 digits only.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value
 *
 * @constant {RegExp} rule Regex rule for text validation
 *
 * @returns {Boolean}
 */
function isValidCC (value) {
  const rule = /^[0-9]{16}$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates a credit card expiry month.
 *
 * A CC expiry month must contain 2 digits from 01 - 12.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value
 *
 * @constant {RegExp} rule Regex rule for text validation
 *
 * @returns {Boolean}
 */
function isValidMM (value) {
  const rule = /^([0][1-9])|([1][0-2])$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates a credit card expiry year.
 *
 * A CC expiry year must contain 2 digits from 00 - 99.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value
 *
 * @constant {RegExp} rule Regex rule for text validation
 *
 * @returns {Boolean}
 */
function isValidYY (value) {
  const rule = /^[0-9][0-9]$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates a credit card CVV PIN.
 *
 * A CC CVV PIN must contain 3 or 4 digits only.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value
 *
 * @constant {RegExp} rule Regex rule for text validation
 *
 * @returns {Boolean}
 */
function isValidCVV (value) {
  const rule = /^[0-9]{3,4}$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates a postal code.
 *
 * A postal code contains 5 or 6 digit integers.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {Number} value
 *
 * @constant {RegExp} rule Regex rule for postal validation
 *
 * @returns {Boolean}
 */
function isValidPostal (value) {
  const rule = /^[0-9]{5,6}$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates an address.
 *
 * An address contains alphabet characters, integers and character spaces only.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value
 *
 * @constant {RegExp} rule Regex rule for address validation
 *
 * @returns {Boolean}
 */
function isValidAddress (value) {
  const rule = /^[a-zA-Z0-9 ]+$/

  value.trim()

  return (rule.test(value))
}
