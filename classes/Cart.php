<?php

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
 *
 * @method void removeItem()
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.4.2
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
     * @return void
     */
    public function __construct()
    {
        $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

        // Check connection
        if ($db->connect_errno) {
            echo 'Connection failed: ' . $db->connect_error;
            exit();
        }

        !isset($_POST['remove']) ?: $this->removeItem($_POST['remove']);

        $this->populateCart($db);
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
        if (($key = array_search($id, $_SESSION['cart']['productId'])) !== false) {
            unset($_SESSION['cart']['productId'][$key]);
            unset($_SESSION['cart']['productName'][$key]);
            unset($_SESSION['cart']['productSize'][$key]);
            unset($_SESSION['cart']['productOrderQty'][$key]);
            unset($_SESSION['cart']['productPrice'][$key]);
            unset($_SESSION['cart']['productSubtotal'][$key]);

            // Rebase index
            $_SESSION['cart']['productId']       = array_values($_SESSION['cart']['productId']);
            $_SESSION['cart']['productName']     = array_values($_SESSION['cart']['productName']);
            $_SESSION['cart']['productSize']     = array_values($_SESSION['cart']['productSize']);
            $_SESSION['cart']['productOrderQty'] = array_values($_SESSION['cart']['productOrderQty']);
            $_SESSION['cart']['productPrice']    = array_values($_SESSION['cart']['productPrice']);
            $_SESSION['cart']['productSubtotal'] = array_values($_SESSION['cart']['productSubtotal']);

            unset($_POST['remove']);
        }
    }

    /**
     * Add items to cart.
     *
     * @param mysqli $db
     *
     * @return void
     */
    private function populateCart($db)
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
     * Get product prices.
     *
     * @param mysqli $db
     *
     * @return array
     */
    private function getProductPrices($db)
    {
        for ($i = 0; $i < count($this->productId); $i++) {
            $getProductPrice = 'SELECT product_price FROM products
                WHERE product_id = ' . $this->productId[$i];

            $productPrices[] = $db->query($getProductPrice)
                ->fetch_object()
                ->product_price;
        }

        return $productPrices;
    }

    /**
     * Calculate subtotals of items.
     *
     * @param array $prices
     *
     * @return array
     */
    private function calculateSubtotals($prices)
    {
        for ($i = 0; $i < count($this->productId); $i++) {
            $subtotals[] = $prices[$i] * $this->productOrderQty[$i];
        }

        return $subtotals;
    }

    /**
     * Calculate total cost of cart.
     *
     * @param array $subtotals
     *
     * @return float
     */
    private function calculateTotal($subtotals)
    {
        $total = 0;

        for ($i = 0; $i < count($this->productId); $i++) {
            $total = $total + $subtotals[$i];
        }

        return $total;
    }
}
