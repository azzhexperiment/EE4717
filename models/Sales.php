<?php

/**
 * Sales operations.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

namespace Sales;

use Actions\SalesActions;
use DB\DB;

// TODO: update docs

class Sales extends SalesActions
{
    public $productId;
    public $productPrice;
    public $productOrderQty;
    public $productSize;
    public $productName;

    /**
     * Add item to cart.
     *
     * @param array $productIds
     * @param array $productPrices
     * @param array $productOrderQtys
     * @param array $productSizes
     * @param array $productNames
     *
     * @return void
     */
    public function __construct(
        $productIds,
        $productPrices,
        $productOrderQtys,
        $productSizes,
        $productNames
    ) {
        $this->productId       = (int)   $productIds;
        $this->productOrderQty = (int)   $productPrices;
        $this->productSize     = (int)   $productOrderQtys;
        $this->productName     = (int)   $productSizes;
        $this->productPrice    = (float) $productNames;

        $this->insertSalesRecord(
            $productIds,
            $productPrices,
            $productOrderQtys,
            $productSizes
        );

        $this->updateCartStatus(
            $productIds,
            $productPrices,
            $productOrderQtys,
            $productSizes
        );

        $this->sendConfirmationMail(
            $productIds,
            $productPrices,
            $productOrderQtys,
            $productSizes,
            $productNames
        );

        $this->emptyCart();
    }

    /**
     * Record sale entry of selected cart items.
     *
     * @param array $productIds
     * @param array $productPrices
     * @param array $productOrderQtys
     * @param array $productSizes
     *
     * @return void
     */
    public function insertSalesRecord(
        $productIds,
        $productPrices,
        $productOrderQtys,
        $productSizes
    ) {
        $db = new DB();

        // TODO: check if need $this
        insertMainSalesEntry(
            $db,
            $productPrices,
            $productOrderQtys
        );

        insertProductSalesEntry(
            $db,
            $productIds,
            $productPrices,
            $productOrderQtys,
            $productSizes
        );

        /**
         * Insert main sales entry.
         *
         * @param DB    $db
         * @param array $productPrices
         * @param array $productOrderQtys
         *
         * @return void
         */
        function insertMainSalesEntry($db, $productPrices, $productOrderQtys)
        {
            $totalAmountPayable = calculateTotalAmount($productPrices, $productOrderQtys);

            $insertSales = 'INSERT INTO sales
                VALUES (DEFAULT, 1, ' . $totalAmountPayable . ', 0)';

            $db->query($insertSales);
        }

        /**
         * Insert product sales entries.
         *
         * @param DB    $db
         * @param array $productIds
         * @param array $productPrices
         * @param array $productOrderQtys
         * @param array $productSizes
         *
         * @return void
         */
        function insertProductSalesEntry(
            $db,
            $productIds,
            $productPrices,
            $productOrderQtys,
            $productSizes
        ) {
            $getSaleId = 'SELECT sale_id FROM sales DES LIMIT 1';

            $saleId = $db->query($getSaleId);

            $subtotals = calculateSubtotals($productPrices, $productOrderQtys);

            // TODO: convert sizes to text

            /**
             * product_sale_id
             * sale_id
             * -- customer_id
             * product_id
             * product_size
             * sale_qty
             * sale_unit_price
             * sale_price
             * total
             */
            for ($i = 0; $i < count($productIds); $i++) {
                $insertProductSale = 'INSERT INTO product_sales
                VALUES (
                    DEFAULT,
                    ' . $saleId               . ',
                    ' . $productIds[$i]       . ',
                    ' . $productSizes[$i]     . ',
                    ' . $productOrderQtys[$i] . ',
                    ' . $productPrices[$i]    . ',
                    ' . $subtotals[$i]        . '
                )';

                $db->query($insertProductSale);
            }
        }

        /**
         * Calculate amount payable.
         *
         * @param array $productPrices
         * @param array $productOrderQtys
         *
         * @return array
         */
        function calculateSubtotals($productPrices, $productOrderQtys)
        {
            for ($i = 0; $i < count($productPrices); $i++) {
                $subtotals[] = $productPrices[$i] * $productOrderQtys[$i];
            }

            return $subtotals;
        }

        /**
         * Calculate amount payable.
         *
         * @param array $productPrices
         * @param array $productOrderQtys
         *
         * @return float
         */
        function calculateTotalAmount($productPrices, $productOrderQtys)
        {
            $total = 0;

            for ($i = 0; $i < count($productPrices); $i++) {
                $total = $total + ($productPrices[$i] * $productOrderQtys[$i]);
            }

            return $total;
        }
    }

    /**
     * Send confirmation email to customer containing selected cart items.
     *
     * @param array $productIds
     * @param array $productPrices
     * @param array $productOrderQtys
     * @param array $productSizes
     * @param array $productNames
     *
     * @return void
     *
     * @todo add recommendations
     */
    public function sendConfirmationMail(
        $productIds,
        $productPrices,
        $productOrderQtys,
        $productSizes,
        $productNames
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
    public function updateCartStatus($productIds)
    {
        // TODO: Add method to update cart status
    }

    /**
     * Remove all items in cart.
     *
     * @return void
     */
    public function emptyCart()
    {
        unset($_SESSION['cart']);
    }

    /**
     * Destroy Sales object.
     *
     * @return void
     */
    public function __destruct()
    {
        // TODO: define destruct method
    }
}
