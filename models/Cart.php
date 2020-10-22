<?php

/**
 * Cart operations.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.1.0
 */

namespace Cart;

use mysqli;

/**
 * Customer cart.
 *
 * @property array $productId
 * @property array $productName
 * @property array $productSize
 * @property array $productOrderQty
 * @property array $productPrice
 * @property array $productSubtotal
 * @property float $productTotal
 */
class Cart
{
    public $productId;
    public $productName;
    public $productSize;
    public $productOrderQty;
    public $productPrice;
    public $productSubtotal;
    public $productTotal;

    /**
     * Construct cart object.
     *
     * @param mysqli $db
     *
     * @return void
     */
    public function __construct($db)
    {
        $this->populateCart($db);

        !isset($_POST['remove']) ?: $this->removeItem($db, $_POST['remove']);
        !isset($_SESSION['remove']) ?: $this->removeItem($db, $_SESSION['remove']);
    }

    /**
     * Add items to cart.
     *
     * Pushes new item into Cart object and $_SESSION alike.
     *
     * @return void
     */
    public function populateCart($db)
    {
        $this->productId       = $_SESSION['cart']['productId'];
        $this->productName     = $_SESSION['cart']['productName'];
        $this->productSize     = $_SESSION['cart']['productSize'];
        $this->productOrderQty = $_SESSION['cart']['productOrderQty'];

        $this->productPrice    = $this->getProductPrices($db);
        $this->productSubtotal = $this->calculateSubtotals($this->productPrice);
        $this->productTotal    = $this->calculateTotal($this->productSubtotal);
    }

    /**
     * Remove designated item from cart.
     *
     * @param int $id
     *
     * @return void
     */
    public function removeItem($id)
    {
        if (($key = array_search($id, $this->productId)) !== false) {

            unset($_SESSION['cart']['productId'][$key]);
            unset($_SESSION['cart']['productName'][$key]);
            unset($_SESSION['cart']['productSize'][$key]);
            unset($_SESSION['cart']['productOrderQty'][$key]);
            unset($_SESSION['cart']['productPrice'][$key]);
            unset($_SESSION['cart']['productSubtotal'][$key]);

            unset($this->productId[$key]);
            unset($this->productName[$key]);
            unset($this->productSize[$key]);
            unset($this->productOrderQty[$key]);
            unset($this->productPrice[$key]);
            unset($this->productSubtotal[$key]);

            $this->productTotal = $this->calculateTotal($this->productSubtotal);

            // TODO: Remove session
            unset($_POST['remove']);
            unset($_SESSION['remove']);
        }
    }

    /**
     * Calculate subtotal cost of item.
     *
     * @param mysqli $db
     *
     * @return array
     */
    public function getProductPrices($db)
    {
        for ($i = 0; $i < count($this->productId); $i++) {

            // TODO: MUST CHANGE TO product_id LATER!!!

            $getProductPrice = 'SELECT product_price FROM products
                WHERE product_category = ' . $this->productId[$i];

            $productPrices[] = $db
                ->query($getProductPrice)
                ->fetch_object()
                ->product_price;
        }

        return $productPrices;
    }

    /**
     * Calculate subtotals of items.
     *
     * @param array $productPrice
     *
     * @return array
     */
    public function calculateSubtotals($prices)
    {
        for ($i = 0; $i < count($this->productId); $i++) {
            $subtotals[] = $prices[$i] * $this->productOrderQty[$i];
        }

        return $subtotals;
    }

    /**
     * Calculate total cost of cart.
     *
     * @param array $productSubtotals
     *
     * @return float
     */
    public function calculateTotal($subtotals)
    {
        $total = 0;

        for ($i = 0; $i < count($this->productId); $i++) {
            $total = $total + $subtotals[$i];
        }

        return $total;
    }

    // TODO: remove method after rewriting to PHP file
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
}
