/**
 * Modify selected cart item qty.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

'use strict'

const form = document.getElementById('form__confirm-order')

form.addEventListener('click', (e) => {
  if (e.target.dataset.type === 'less') {
    e.preventDefault()

    const item = document.getElementById('product__qty-input-' + e.target.dataset.id)

    reduceQty(item)
  }

  if (e.target.dataset.type === 'more') {
    e.preventDefault()

    const item = document.getElementById('product__qty-input-' + e.target.dataset.id)

    increaseQty(item)
  }
})

/**
 * Decrease qty of selected cart item.
 *
 * @param {String} item
 *
 * @returns {Void}
 */
function reduceQty (item) {
  if (item.value > 1) {
    item.value--
  }
}

/**
 * Increase qty of selected cart item.
 *
 * @param {String} item
 *
 * @returns {Void}
 */
function increaseQty (item) {
  item.value++
}
