<?php

/**
 * Cart operations.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.1.0
 */

namespace Cart;

/**
 * Customer cart
 *
 * @property array $productId
 * @property array $productName
 * @property array $productSize
 * @property array $productOrderQty
 */
class Cart
{
    public $productId;
    public $productName;
    public $productSize;
    public $productOrderQty;

    /**
     * Construct cart object.
     *
     * @return object
     */
    public function __construct()
    {
        $this->productId       = $_SESSION['cart']['productId'];
        $this->productName     = $_SESSION['cart']['productName'];
        $this->productSize     = $_SESSION['cart']['productSize'];
        $this->productOrderQty = $_SESSION['cart']['productOrderQty'];
    }

    // TODO: update param types
    /**
     * Add item to cart.
     *
     * Pushes new item into Cart object and $_SESSION alike.
     *
     * @param array $productId
     * @param array $productName
     * @param array $productSize
     * @param array $productOrderQty
     *
     * @return void
     */
    public function addToCart($productId, $productName, $productSize, $productOrderQty)
    {
        // Update object
        array_push($this->productId, $productId);
        array_push($this->productName, $productName);
        array_push($this->productSize, $productSize);
        array_push($this->productOrderQty, $productOrderQty);

        // Update $_SESSION
        $_SESSION['cart']['productId']       = $this->productId;
        $_SESSION['cart']['productName']     = $this->productName;
        $_SESSION['cart']['productSize']     = $this->productSize;
        $_SESSION['cart']['productOrderQty'] = $this->productOrderQty;
    }

    /**
     * Remove designated item from cart.
     *
     * @param int $productId
     *
     * @return void
     */
    public function removeItem($id)
    {
        if (($key = array_search($id, $this->productId)) !== false) {
            // Update object
            unset($this->productId[$key]);
            unset($this->productName[$key]);
            unset($this->productSize[$key]);
            unset($this->productOrderQty[$key]);

            // Update $_SESSION
            unset($_SESSION['cart']['productId'][$key]);
            unset($_SESSION['cart']['productName'][$key]);
            unset($_SESSION['cart']['productSize'][$key]);
            unset($_SESSION['cart']['productOrderQty'][$key]);

            // TODO: double check where this tag will be stored
            unset($_POST['remove']);
        }
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
        // TODO: check for login status before sending to DB, if using login
    }
}
