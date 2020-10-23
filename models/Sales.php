<?php

/**
 * Sales operations.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.3.4
 */

namespace Sales;

use mysqli;

/**
 * Sales object.
 *
 * @property array $productId
 * @property array $productName
 * @property array $productSize
 * @property array $productOrderQty
 * @property array $productPrice
 * @property array $productSubtotal
 * @property float $productTotal
 * @property int   $saleId
 * @property int   $saleStatus
 */
class Sales
{
    // TODO: do i really need these or just saleId
    public $productId;
    public $productName;
    public $productSize;
    public $productOrderQty;
    public $productPrice;
    public $productSubtotal;
    public $productTotal;
    public $saleId;
    public $saleStatus;

    /**
     * Construct sales object.
     *
     * @param mysqli $db
     * @param array  $productId
     * @param array  $productName
     * @param array  $productSize
     * @param array  $productOrderQty
     * @param array  $productPrice
     * @param array  $productSubtotal
     * @param float  $productTotal
     * @param int    $saleStatus
     *
     * @return void
     */
    public function __construct(
        $db,
        $productId,
        $productName,
        $productSize,
        $productOrderQty,
        $productPrice,
        $productSubtotal,
        $productTotal,
        $saleStatus
    ) {
        // TODO: do i really need these
        $this->productId       = $productId;
        $this->productName     = $productName;
        $this->productSize     = $productSize;
        $this->productOrderQty = $productOrderQty;
        $this->productPrice    = $productPrice;
        $this->productSubtotal = $productSubtotal;
        $this->productTotal    = $productTotal;

        $this->insertSalesRecord(
            $db,
            $productId,
            $productSize,
            $productOrderQty,
            $productPrice,
            $productSubtotal,
            $productTotal,
            $saleStatus
        );

        echo '<pre>';
        print_r('sales record updated');
        echo '</pre>';

        // TODO: Set conditions
        $this->updateSaleStatus($db, $this->saleId, $saleStatus);

        $this->updateInventory($db, $productId, $productOrderQty);

        $this->sendConfirmationMail(
            $db,
            $productId,
            $productName,
            $productSize,
            $productOrderQty,
            $productPrice,
            $productSubtotal,
            $productTotal
        );

        $this->emptyCart();
    }

    /**
     * Record sale entry of selected cart items.
     *
     * @param array $productId
     * @param array $productPrice
     * @param array $productOrderQty
     * @param array $productSize
     *
     * @return void
     */
    public function insertSalesRecord(
        $db,
        $productId,
        $productSize,
        $productOrderQty,
        $productPrice,
        $productSubtotal,
        $productTotal,
        $saleStatus
    ) {
        $this->insertMainSalesEntry($db, $saleStatus, $productTotal);

        $this->saleId = $this->getSaleId($db);

        $this->insertProductSalesEntry(
            $db,
            $this->saleId,
            $productId,
            $productOrderQty,
            $productPrice,
            $productSubtotal,
            $productSize
        );
    }

    /**
     * Insert main sales entry.
     *
     * @param mysqli $db
     * @param int    $saleStatus
     * @param float  $productTotal
     *
     * @return void
     */
    private function insertMainSalesEntry($db, $saleStatus, $productTotal)
    {
        $insertSales = 'INSERT INTO sales SET
            sale_id          = DEFAULT              ,
            sale_status_id   = ' . $saleStatus   . ',
            sale_amount      = ' . $productTotal . ',
            sale_amount_paid = 0                    ,
            created_at       = CURRENT_TIMESTAMP';

        $db->query($insertSales);
    }

    /**
     * Insert product sales entries.
     *
     * @param mysqli $db
     * @param int    $saleId
     * @param array  $productId
     * @param array  $productOrderQty
     * @param array  $productPrice
     * @param array  $productSubtotal
     * @param array  $productSize
     *
     * @return void
     */
    private function insertProductSalesEntry(
        $db,
        $saleId,
        $productId,
        $productOrderQty,
        $productPrice,
        $productSubtotal,
        $productSize
    ) {
        // TODO: add proper customer_id
        for ($i = 0; $i < count($productId); $i++) {
            if (is_null($productSize[$i])) {
                $productSize[$i] = 'N/A';
            }

            $insertProductSale = 'INSERT INTO product_sales SET
                product_sale_id = DEFAULT                       ,
                sale_id         = '  . $saleId              . ' ,
                customer_id     = 1                             ,
                product_id      = '  . $productId[$i]       . ' ,
                sale_qty        = '  . $productOrderQty[$i] . ' ,
                sale_unit_price = '  . $productPrice[$i]    . ' ,
                total           = '  . $productSubtotal[$i] . ' ,
                product_size    = "' . $productSize[$i]     . '",
                created_at      = CURRENT_TIMESTAMP';

            echo '<pre>';
            print_r($insertProductSale);
            echo '</pre>';

            $db->query($insertProductSale);
        }
    }

    /**
     * Get saleId from DB.
     *
     * @param mysqli $db
     *
     * @return void
     */
    public function getSaleId($db)
    {
        $getSaleId = 'SELECT sale_id FROM sales DES LIMIT 1';

        return $db->query($getSaleId)->fetch_object()->sale_id;
    }

    /**
     * Update inventory size in DB.
     *
     * @param mysqli $db
     * @param array  $productIds
     * @param array  $productOrderQtys
     *
     * @return void
     */
    public function updateInventory($db, $productId, $productOrderQty)
    {
        for ($i = 0; $i < count($productId); $i++) {
            $updateInventory = 'UPDATE stocks
                SET stock_qty = stock_qty - ' . $productOrderQty[$i] . '
                WHERE product_id = ' . $productId[$i];

            $db->query($updateInventory);
        }
    }

    /**
     * Send confirmation email to customer containing selected cart items.
     *
     * @param array $productId
     * @param array $productPrice
     * @param array $productOrderQty
     * @param array $productSize
     * @param array $productName
     *
     * @return void
     *
     * @todo add recommendations
     */
    public function sendConfirmationMail(
        $db,
        $productId,
        $productName,
        $productSize,
        $productOrderQty,
        $productPrice,
        $productSubtotal,
        $productTotal
    ) {
        // TODO: Add method to send mail
    }

    /**
     * Update status of selected cart items.
     *
     * @param array $productIds
     *
     * @return void
     */
    public function updateSaleStatus($db, $saleId, $status)
    {
        // 1 Pending confirmation
        // 2 Pending payment
        // 3 Payment received
        // 4 Shipping
        // 5 Completed

        $updateSaleStatus = 'UPDATE sales
            SET sale_status_id = ' . $status . '
            WHERE sale_id = ' . $saleId;

        $db->query($updateSaleStatus);
    }

    /**
     * Remove all items in cart.
     *
     * @return void
     */
    public function emptyCart()
    {
        // TODO: change to unset only selected items
        unset($_SESSION['cart']);
    }
}
