<?php

/**
 * Cart interface.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.1.0
 */

namespace Actions;

interface CartActions
{
    /**
     * Add item to cart.
     *
     * Pushes new item into existing cart array stored in $_SESSION.
     *
     * @param int    $productId
     * @param int    $productOrderQty
     * @param string $productName
     *
     * @return void
     */
    public function addToCart($productId, $productOrderQty, $productName);

    /**
     * Get all items in cart.
     *
     * @return array
     */
    public function getCartContent();

    /**
     * Get id from all items in cart.
     *
     * @return array
     */
    public function getCartContentIds();

    /**
     * Get names from all items in cart.
     *
     * @return array
     */
    public function getCartContentNames();

    /**
     * Remove designated item from cart.
     *
     * @param int $productId
     *
     * @return void
     */
    public function removeItem($productId);

    /**
     * Remove all items in cart.
     *
     * @return void
     */
    public function emptyCart();
}
