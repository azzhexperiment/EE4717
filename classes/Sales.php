<?php

namespace Sales;

use mysqli;

/**
 * Sales object.
 *
 * @property int   $customerId
 * @property int   $saleId
 * @property array $productId
 * @property array $productName
 * @property array $productSize
 * @property array $productOrderQty
 * @property array $productPrice
 * @property array $productSubtotal
 * @property float $productTotal
 *
 * @method array retrieveSaleRecord()
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.3.4
 */
class Sales
{
    public $customerId;
    public $saleId;
    public $productId;
    public $productName;
    public $productSize;
    public $productOrderQty;
    public $productPrice;
    public $productSubtotal;
    public $productTotal;

    /**
     * Construct sales object.
     *
     * If a new sales entry is submitted, construct a new sales object and
     * perform necessary DB operations. Else if the entry is for confirmation
     * of sales, retrieve sales record for user confirmation and payment.
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

        $this->customerId      = $_SESSION['customerId'];
        $this->productId       = $_SESSION['productId'];
        $this->productName     = $this->getProductNames($db, $this->productId);
        $this->productSize     = $_SESSION['productSize'];
        $this->productOrderQty = $_SESSION['productOrderQty'];
        $this->productPrice    = $this->getProductPrices($db, $this->productId);

        $this->calculateSubtotals();

        $this->calculateTotal();

        $this->insertSaleRecord($db);

        $this->updateInventory($db);

        // $this->sendConfirmationMail();

        $this->emptyCart();
    }

    /**
     * Record sale entry of selected cart items.
     *
     * @param mysqli $db
     * @param int    $saleId
     *
     * @return array
     */
    public function retrieveSaleRecord($db, $saleId)
    {
        $retrieveSaleRecord = "SELECT
            sales.sale_amount,
            product_sales.product_id,
            product_sales.sale_qty,
            product_sales.sale_unit_price,
            product_sales.total,
            product_sales.product_size

            FROM sales
            INNER JOIN product_sales
                ON sales.sale_id = product_sales.sale_id
            WHERE  sales.sale_id = $saleId";

        $result = $db->query($retrieveSaleRecord);

        // Fetch records from sales and product_sales
        while ($saleRecord = $result->fetch_object()) {
            $saleRecords[] = $saleRecord;
        }

        // Fetch and append product names
        for ($i = 0; $i < count($saleRecords); $i++) {
            $saleRecords[$i]->product_name = $this
                ->getProductNames($db, $saleRecords[$i]->product_id);
        }

        return $saleRecords;
    }

    /**
     * Record sale entry of selected cart items.
     *
     * @param mysqli $db
     * @param array  $productId
     * @param array  $productSize
     * @param array  $productOrderQty
     * @param array  $productPrice
     * @param array  $productSubtotal
     * @param float  $productTotal
     * @param int    $saleStatus
     *
     * @return void
     */
    private function insertSaleRecord($db)
    {
        $this->insertMainSaleEntry($db);
        $this->insertProductSaleEntry($db);
    }

    /**
     * Insert main sales entry.
     *
     * @param mysqli $db
     *
     * @return void
     */
    private function insertMainSaleEntry($db)
    {
        $insertSales = "INSERT INTO sales
            SET
                sale_id     = DEFAULT            ,
                sale_amount = $this->productTotal,
                created_at  = CURRENT_TIMESTAMP";

        $db->query($insertSales);

        $this->saleId = $db->insert_id;
    }

    /**
     * Insert product sales entries.
     *
     * @param mysqli $db
     *
     * @return void
     */
    private function insertProductSaleEntry($db)
    {
        for ($i = 0; $i < count($this->productId); $i++) {
            echo 1;
            $insertProductSale = 'INSERT INTO product_sales
                SET
                    product_sale_id = DEFAULT,
                    sale_id         = "' . $this->saleId              . '",
                    customer_id     = "' . $this->customerId          . '",
                    product_id      = "' . $this->productId[$i]       . '",
                    sale_qty        = "' . $this->productOrderQty[$i] . '",
                    sale_unit_price = "' . $this->productPrice[$i]    . '",
                    total           = "' . $this->productSubtotal[$i] . '",
                    product_size    = "' . $this->productSize[$i]     . '",
                    created_at      = CURRENT_TIMESTAMP';

            $db->query($insertProductSale);
        }
    }

    /**
     * Update inventory size in DB.
     *
     * @param mysqli $db
     *
     * @return void
     */
    private function updateInventory($db)
    {
        for ($i = 0; $i < count($this->productId); $i++) {
            $updateInventory = 'UPDATE stocks
                SET   stock_qty  = stock_qty - ' . $this->productOrderQty[$i] . '
                WHERE product_id = $this->productId[$i]';

            $db->query($updateInventory);
        }
    }

    /**
     * Get product prices.
     *
     * @param mysqli $db
     * @param int    $productId
     *
     * @return array
     */
    private function getProductPrices($db, $productId)
    {
        for ($i = 0; $i < count($productId); $i++) {
            $getProductPrice = 'SELECT product_price FROM products
                WHERE product_id = ' . $productId[$i];

            $productPrices[] = $db->query($getProductPrice)
                ->fetch_object()
                ->product_price;
        }

        return $productPrices;
    }

    /**
     * Get product names.
     *
     * @param mysqli $db
     * @param int    $productId
     *
     * @return array
     */
    private function getProductNames($db, $productId)
    {
        for ($i = 0; $i < count($productId); $i++) {
            $getProductName = 'SELECT product_name FROM products
                WHERE product_id = ' . $productId[$i];

            $productNames[] = $db->query($getProductName)
                ->fetch_object()
                ->product_name;
        }

        return $productNames;
    }

    /**
     * Calculate subtotals of items.
     *
     * @return void
     */
    private function calculateSubtotals()
    {
        for ($i = 0; $i < count($this->productPrice); $i++) {
            $subtotals[] = $this->productPrice[$i] * $this->productOrderQty[$i];
        }

        $this->productSubtotal = $subtotals;
    }

    /**
     * Calculate total cost of cart.
     *
     * @return void
     */
    private function calculateTotal()
    {
        $total = 0;

        for ($i = 0; $i < count($this->productSubtotal); $i++) {
            $total = $total + $this->productSubtotal[$i];
        }

        $this->productTotal = $total;
    }

    /**
     * Send confirmation email to customer containing selected cart items.
     *
     * @param array  $productId
     * @param array  $productName
     * @param array  $productSize
     * @param array  $productOrderQty
     * @param array  $productPrice
     * @param array  $productSubtotal
     * @param array  $productTotal
     *
     * @return void
     */
    private function sendConfirmationMail()
    {
        // TODO: Add method to send mail
        // TODO: add recommendations
    }

    /**
     * Remove all items in cart.
     *
     * @return void
     */
    private function emptyCart()
    {
        unset($_SESSION['cart']);
    }
}
