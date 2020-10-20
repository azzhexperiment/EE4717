<?php

/**
 * Sales actions.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

namespace Actions;

// TODO: update docs

/**
 * Methods for sales entries.
 *
 * @method mixed logPurchase()
 * @method mixed sendConfirmationMail()
 * @method mixed updateCartStatus()
 * @method mixed emptyCart()
 */
interface SalesActions
{
    /**
     * Record sale entry of selected cart items.
     *
     * @param int $productId
     * @param int $productOrderQty
     * @param int $productSize
     *
     * @return void
     */
    public function insertSalesRecord(
        $productIds,
        $productPrices,
        $productOrderQtys,
        $productSizes
    );

    /**
     * Send confirmation email to customer containing selected cart items.
     *
     * @param int $productId
     * @param int $productOrderQty
     * @param int $productSize
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
    );

    /**
     * Update status of selected cart items.
     *
     * @param array $productIds
     *
     * @return void
     */
    public function updateCartStatus($productIds);

    /**
     * Remove all items in cart.
     *
     * @return void
     */
    public function emptyCart();
}
