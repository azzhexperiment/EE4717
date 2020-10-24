/**
 * Validate contact form for CLEO & AZZH.
 *
 * Modify the Contact page so that the input data for name, email, query
 * and message are validated once the data is entered into each field.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.3.1
 */

'use strict'

// Form elements
const form = document.getElementById('form__contact')
const nameContent = document.getElementById('contact__input-name')
const emailContent = document.getElementById('contact__input-email')
const queryType = document.getElementById('contact__input-type')
const messageContent = document.getElementById('contact__input-message')
const submitButton = document.getElementById('contact__submit')

// Error messages
const errorName = document.getElementById('error__name')
const errorEmail = document.getElementById('error__email')
const errorType = document.getElementById('error__type')
const errorMessage = document.getElementById('error__message')
const errorSubmit = document.getElementById('error__submit')

/**
 * Listens to the <name> field and show error message on blur, if applicable.
 */
nameContent.addEventListener('blur', (event) => {
  if (nameContent.value === '') {
    errorName.textContent = 'This field is compulsory!'
  } else if (isValidName(nameContent.value)) {
    errorName.textContent = ''
  } else {
    errorName.textContent = 'Enter characters and whitespaces only!'
  }
})

/**
 * Listens to the <email> field and show error message on blur, if applicable.
 */
emailContent.addEventListener('blur', (event) => {
  if (emailContent.value === '') {
    errorEmail.textContent = 'This field is compulsory!'
  } else if (isValidEmail(emailContent.value)) {
    errorEmail.textContent = ''
  } else {
    errorEmail.textContent = 'Your email contains invalid symbols!'
  }
})

/**
 * Listens to the <query> field and show error message on blur, if applicable.
 */
queryType.addEventListener('blur', (event) => {
  if (isValidQueryType(queryType.value)) {
    errorType.textContent = ''
  } else {
    errorType.textContent = 'You must select a query type!'
  }
})

/**
 * Listens to the <message> field and show error message on blur, if applicable.
 */
messageContent.addEventListener('blur', (event) => {
  if (messageContent.value === '') {
    errorMessage.textContent = 'This field is compulsory!'
  } else if (isValidMessage(messageContent.value)) {
    errorMessage.textContent = ''
  } else {
    errorMessage.textContent = 'You need to indicate your work experience!'
  }
})

/**
 * Validate everything before submission to double check.
 */
submitButton.addEventListener('click', (event) => {
  event.preventDefault()

  if (!isValidName(nameContent.value) ||
    !isValidEmail(emailContent.value) ||
    !isValidQueryType(queryType.value) ||
    !isValidMessage(messageContent.value)) {
    errorSubmit.textContent = 'Fields contain invalid data!'
  } else {
    nameContent.value = nameContent.value.trim()
    emailContent.value = emailContent.value.trim()
    queryType.value = queryType.value.trim()
    messageContent.value = messageContent.value.trim()

    form.submit()
  }
})

/**
 * Validates user 'name' field.
 *
 * The name field contains alphabet characters and character spaces.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value - User input name
 *
 * @constant {RegExp} rule - Regex rule for name validation
 *
 * @returns {Boolean}
 */
function isValidName (value) {
  const rule = /^[a-zA-Z ]+$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates user 'email' field.
 *
 * The email field contains a user name part follows by "@" and a domain name
 * part. The user name contains word characters including hyphen ("-") and
 * period (".").
 *
 * The domain name contains two to four address extensions. Each extension is
 * string of word characters and separated from the others by a period (".").
 * The last extension must have two to three characters.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value - User input email
 *
 * @constant {RegExp} rule - Regex rule for email validation
 *
 * @returns {Boolean}
 */
function isValidEmail (value) {
  const rule = /^[\w][\w.-]*@([\w][\w-]*\.){1,3}[a-zA-Z]{2,3}$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates user 'query' field.
 *
 * The query must be from the dropdown list.
 *
 * This function takes in the query value from user input and compares against
 * the list of default values to check against tempering.
 *
 * @param {String} value - User input date
 *
 * @returns {Boolean}
 */
function isValidQueryType (value) {
  return (value === 'general' || value === 'complain' || value === 'customerservice')
}

/**
 * Validates user 'message' field.
 *
 * Message cannot be empty.
 *
 * @param {String} value - User input message
 *
 * @returns {Boolean}
 */
function isValidMessage (value) {
  return (value !== '')
}
