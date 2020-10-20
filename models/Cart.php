<?php

/**
 * Cart operations.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.1.0
 */

namespace Cart;

use Actions\CartActions;

class Cart implements CartActions
{
    public $productId;
    public $productName;
    public $productOrderQty;

    /**
     * Construct cart object.
     *
     * @param int    $productId
     * @param int    $productOrderQty
     * @param string $productName
     *
     * @return void
     */
    public function __construct()
    {
        $this->productId       = $_SESSION['cart']['productId'];
        $this->productName     = $_SESSION['cart']['productName'];
        $this->productOrderQty = $_SESSION['cart']['productOrderQty'];
    }

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
    public function addToCart($productId, $productOrderQty, $productName)
    {
        // Type safety
        $productId       = (int) $productId;
        $productName     = (string) $productName;
        $productOrderQty = (int) $productOrderQty;

        $_SESSION['cart']['productId']       = array_push($productId);
        $_SESSION['cart']['productName']     = array_push($productName);
        $_SESSION['cart']['productOrderQty'] = array_push($productOrderQty);
    }

    /**
     * Get all items in cart.
     *
     * @return array
     */
    public function getCartContent()
    {
        return $_SESSION['cart'];
    }

    /**
     * Get id from all items in cart.
     *
     * @return array
     */
    public function getCartContentIds()
    {
        return $_SESSION['cart']['id'];
    }

    /**
     * Get names from all items in cart.
     *
     * @return array
     */
    public function getCartContentNames()
    {
        return $_SESSION['cart']['name'];
    }

    /**
     * Remove designated item from cart.
     *
     * @param int $productId
     *
     * @return void
     */
    public function removeItem($productId)
    {
        $key = array_search($productId, array_column($_SESSION['cart'], 'productId'));

        unset($_SESSION['cart']['productId'][$key]);
        unset($_SESSION['cart']['productName'][$key]);
        unset($_SESSION['cart']['productOrderQty'][$key]);

        // TODO: double check where this tag will be stored
        unset($_POST['remove']);
    }

    /**
     * Remove all items in cart.
     *
     * @return void
     */
    public function emptyCart()
    {
        unset($_SESSION['cart']);

        unset($_POST['empty']);
    }

    /**
     * Destroy cart object.
     *
     * Send all items to DB for future retrieval in case of session end.
     *
     * @return void
     */
    public function __destruct()
    {
        // TODO: check for login status before sending to DB
    }
}
