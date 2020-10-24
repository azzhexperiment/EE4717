/**
 * Validate user login/signup for CLEO & AZZH.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.1.0
 */

'use strict'

// General form elements
const form = document.getElementById('form__user')

// Login form elements
const loginEmail = document.getElementById('login__input-email')
const loginSubmitButton = document.getElementById('login__submit')

// Sign up form elements
const signupFirstName = document.getElementById('signup__input-first-name')
const signupLastName = document.getElementById('signup__input-last-name')
const signupEmail = document.getElementById('signup__input-email')
const signupPassword1 = document.getElementById('signup__input-password-1')
const signupPassword2 = document.getElementById('signup__input-password-2')
const signupAddress1 = document.getElementById('signup__input-address-1')
const signupAddress2 = document.getElementById('signup__input-address-2')
const signupCountry = document.getElementById('signup__input-country')
const signupCity = document.getElementById('signup__input-city')
const signupPostal = document.getElementById('signup__input-postal')
const signupSubmitButton = document.getElementById('signup__submit')

// Error messages
const errorFirstName = document.getElementById('error__first-name')
const errorLastName = document.getElementById('error__last-name')
const errorEmail = document.getElementById('error__email')
const errorPassword1 = document.getElementById('error__password-1')
const errorPassword2 = document.getElementById('error__password-2')
const errorAddress1 = document.getElementById('error__address-1')
const errorAddress2 = document.getElementById('error__address-2')
const errorCountry = document.getElementById('error__country')
const errorCity = document.getElementById('error__city')
const errorPostal = document.getElementById('error__postal')
const errorSubmit = document.getElementById('error__submit')

window.onclick = (e) => {
  console.log('Click')
  console.log(e.target)
  console.log('Desired')
  console.log(signupFirstName)
}

/**
 * Error control for <login.email> field.
 */
loginEmail.addEventListener('blur', () => {
  if (loginEmail.value === '') {
    errorEmail.textContent = 'This field is compulsory!'
  } else if (isValidEmail(loginEmail.value)) {
    errorEmail.textContent = ''
  } else {
    errorEmail.textContent = 'Your email contains invalid symbols!'
  }
})

/**
 * Error control for <signup.firstname> field.
 */
signupFirstName.addEventListener('blur', () => {
  if (signupFirstName.value === '') {
    errorFirstName.textContent = 'This field is compulsory!'
  } else if (isValidText(signupFirstName.value)) {
    errorFirstName.textContent = ''
  } else {
    errorFirstName.textContent = 'Enter characters and whitespaces only!'
  }
})

/**
 * Error control for <signup.lastname> field.
 */
signupLastName.addEventListener('blur', () => {
  if (signupLastName.value === '') {
    errorLastName.textContent = 'This field is compulsory!'
  } else if (isValidText(signupLastName.value)) {
    errorLastName.textContent = ''
  } else {
    errorLastName.textContent = 'Enter characters and whitespaces only!'
  }
})

/**
 * Error control for <signup.email> field.
 */
signupEmail.addEventListener('blur', () => {
  if (signupEmail.value === '') {
    errorEmail.textContent = 'This field is compulsory!'
  } else if (isValidEmail(signupEmail.value)) {
    errorEmail.textContent = ''
  } else {
    errorEmail.textContent = 'Your email contains invalid symbols!'
  }
})

/**
 * Error control for <signup.password> field.
 */
signupPassword1.addEventListener('blur', () => {
  if (signupPassword1.value === '') {
    errorPassword1.textContent = 'This field is compulsory!'
  } else if (isMatch(signupPassword1.value, signupPassword2.value)) {
    errorPassword1.textContent = ''
    errorPassword2.textContent = ''
  } else {
    errorPassword1.textContent = 'Your passwords do not match!'
    errorPassword2.textContent = 'Your passwords do not match!'
  }
})

/**
 * Error control for <signup.password> field.
 */
signupPassword2.addEventListener('blur', () => {
  if (signupPassword2.value === '') {
    errorPassword1.textContent = 'This field is compulsory!'
  } else if (isMatch(signupPassword1.value, signupPassword2.value)) {
    errorPassword1.textContent = ''
    errorPassword2.textContent = ''
  } else {
    errorPassword1.textContent = 'Your passwords do not match!'
    errorPassword2.textContent = 'Your passwords do not match!'
  }
})

/**
 * Error control for <signup.address1> field.
 */
signupAddress1.addEventListener('blur', () => {
  if (signupAddress1.value === '') {
    errorAddress1.textContent = 'This field is compulsory!'
  } else if (isValidAddress(signupAddress1.value)) {
    errorAddress1.textContent = ''
  } else {
    errorAddress1.textContent = 'Your address contains invalid symbols!'
  }
})

/**
 * Error control for <signup.address2> field.
 */
signupAddress2.addEventListener('blur', () => {
  if (signupAddress2.value === '') {
    errorAddress2.textContent = 'This field is compulsory!'
  } else if (isValidAddress(signupAddress2.value)) {
    errorAddress2.textContent = ''
  } else {
    errorAddress2.textContent = 'Your address contains invalid symbols!'
  }
})

/**
 * Error control for <signup.country> field.
 */
signupCountry.addEventListener('blur', () => {
  if (signupCountry.value === '') {
    errorCountry.textContent = 'This field is compulsory!'
  } else if (isValidText(signupCountry.value)) {
    errorCountry.textContent = ''
  } else {
    errorCountry.textContent = 'Enter characters and whitespaces only!'
  }
})

/**
 * Error control for <signup.city> field.
 */
signupCity.addEventListener('blur', () => {
  if (signupCity.value === '') {
    errorCity.textContent = 'This field is compulsory!'
  } else if (isValidText(signupCity.value)) {
    errorCity.textContent = ''
  } else {
    errorCity.textContent = 'Enter characters and whitespaces only!'
  }
})

/**
 * Error control for <signup.postal> field.
 */
signupPostal.addEventListener('blur', () => {
  if (signupPostal.value === '') {
    errorPostal.textContent = 'This field is compulsory!'
  } else if (isValidPostal(signupPostal.value)) {
    errorPostal.textContent = ''
  } else {
    errorPostal.textContent = 'Enter characters and whitespaces only!'
  }
})

/**
 * Validate everything before submission to double check.
 */
loginSubmitButton.addEventListener('click', (event) => {
  event.preventDefault()

  if (!isValidEmail(loginEmail.value)) {
    errorSubmit.textContent = 'Invalid email format!'
  } else {
    loginEmail.value = loginEmail.value.trim()

    form.submit()
  }
})

/**
 * Validate everything before submission to double check.
 */
signupSubmitButton.addEventListener('click', (event) => {
  event.preventDefault()

  if (!isValidText(signupFirstName.value) ||
    !isValidText(signupLastName.value) ||
    !isValidEmail(signupEmail.value) ||
    !isMatch(signupPassword1.value, signupPassword2.value) ||
    !isValidAddress(signupAddress1.value) ||
    !isValidAddress(signupAddress2.value) ||
    !isValidText(signupCountry.value) ||
    !isValidText(signupCity.value) ||
    !isValidPostal(signupPostal.value)) {
    errorSubmit.textContent = 'Fields contain invalid data!'
  } else {
    signupFirstName.value = signupFirstName.value.trim()
    signupLastName.value = signupLastName.value.trim()
    signupEmail.value = signupEmail.value.trim()
    signupAddress1.value = signupAddress1.value.trim()
    signupAddress2.value = signupAddress2.value.trim()
    signupCountry.value = signupCountry.value.trim()
    signupCity.value = signupCity.value.trim()
    signupPostal.value = signupPostal.value.trim()

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
 * Validates a potsal code.
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

/**
 * Validates an email.
 *
 * An email contains a user name part follows by "@" and a domain name part.
 *
 * The name contains word characters including hyphen ("-") and period (".").
 *
 * The domain contains two to four address extensions. Each extension is
 * string of word characters and separated from the others by a period (".").
 * The last extension must have two to three characters.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value User input email
 *
 * @constant {RegExp} rule Regex rule for email validation
 *
 * @returns {Boolean}
 */
function isValidEmail (value) {
  const rule = /^[\w][\w.-]*@([\w][\w-]*\.){1,3}[a-zA-Z]{2,3}$/

  value.trim()

  return (rule.test(value))
}

/**
 * Check if 2 passwords match.
 *
 * @param {String} password1 User input password
 * @param {String} password2 User input password
 *
 * @returns {Boolean}
 */
function isMatch (password1, password2) {
  return password1 === password2
}
