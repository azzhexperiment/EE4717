/**
 * Modify product qty.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

const form = document.getElementById('form__product')
const qty = document.getElementById('product__qty-input')
const reduceQtyBtn = document.getElementById('product__qty--less')
const increaseQtyBtn = document.getElementById('product__qty--more')

form.addEventListener('click', (e) => {
  if (e.target === reduceQtyBtn) {
    e.preventDefault()
    reduceQty()
  }

  if (e.target === increaseQtyBtn) {
    e.preventDefault()
    increaseQty()
  }
})

/**
 * Decrease qty of product for purchase.
 *
 * @returns {Void}
 */
function reduceQty () {
  if (qty.value > 0)
    qty.value--
}

/**
 * Increase qty of product for purchase.
 *
 * @returns {Void}
 */
function increaseQty () {
  qty.value++
}
