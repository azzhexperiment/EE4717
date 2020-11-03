<?php

namespace Dashboard;

use mysqli;

/**
 * Create new Dashboard interface to get sales stats for admin views.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */
class Dashboard
{
    public $today;
    public $allTime;
    public $lastSevenDays;
    public $lastMonth;
    public $bestSellerId;
    public $bestSeller;
    public $inventory;

    /**
     * Construct new Dashboard object.
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

        $this->getSalesToday($db);
        $this->getSalesAllTime($db);
        $this->getSalesLastSevenDays($db);
        $this->getSalesLastMonth($db);
        $this->getBestSellerId($db);
        $this->getBestSeller($db);
        $this->getInventory($db);
    }

    /**
     * Get total sales amount.
     *
     * @param mysqli $db
     *
     * @return void
     */
    public function getSalesAllTime($db)
    {
        $getSales = 'SELECT SUM(sale_amount) AS amt FROM sales';

        $this->allTime = $db->query($getSales)->fetch_object();
    }

    /**
     * Get sales amount from today.
     *
     * @param mysqli $db
     *
     * @return void
     */
    public function getSalesToday($db)
    {
        $getSales = 'SELECT SUM(sale_amount) AS amt FROM sales
            WHERE created_at >= CURDATE()';

        $this->today = $db->query($getSales)->fetch_object();
    }

    /**
     * Get sales amount from past 7 days.
     *
     * @param mysqli $db
     *
     * @return void
     */
    public function getSalesLastSevenDays($db)
    {
        $getSales = 'SELECT SUM(sale_amount) AS amt FROM sales
            WHERE created_at > DATE_SUB(NOW(), INTERVAL 7 day)';

        $this->lastSevenDays = $db->query($getSales)->fetch_object();
    }

    /**
     * Get sales amount from last month.
     *
     * @param mysqli $db
     *
     * @return void
     */
    public function getSalesLastMonth($db)
    {
        $getSales = 'SELECT SUM(sale_amount) AS amt FROM sales
            WHERE created_at
                BETWEEN SUBDATE(CURDATE(), INTERVAL 1 MONTH)
                AND     NOW()';

        $this->lastMonth = $db->query($getSales)->fetch_object();
    }

    /**
     * Get best selling product id.
     *
     * @param mysqli $db
     *
     * @return void
     */
    public function getBestSellerId($db)
    {
        $getBestSellerId = 'SELECT product_id FROM stocks
            ORDER BY sold_qty DESC LIMIT 1';

        $this->bestSellerId = $db->query($getBestSellerId)->fetch_object()
            ->product_id;
    }

    /**
     * Get info on the best selling product.
     *
     * @param mysqli $db
     *
     * @return void
     */
    public function getBestSeller($db)
    {
        $getBestSeller = "SELECT * FROM products
            WHERE product_id = $this->bestSellerId";

        $this->bestSeller = $db->query($getBestSeller)->fetch_object();
    }

    public function getInventory($db)
    {
        $getInventory    = 'SELECT product_id, stock_qty FROM stocks
            ORDER BY product_id ASC';
        $getProductNames = 'SELECT product_name FROM products
            ORDER BY product_id ASC';

        $resultInventory = $db->query($getInventory);
        $resultNames     = $db->query($getProductNames);

        while ($inventory = $resultInventory->fetch_object()) {
            $inventories['id'][]  = $inventory->product_id;
            $inventories['qty'][] = $inventory->stock_qty;
        }

        while ($name = $resultNames->fetch_object()) {
            $inventories['name'][]  = $name->product_name;
        }

        $this->inventory = $inventories;
    }

    public function updateInventory($id, $qty)
    {
        $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

        // Check connection
        if ($db->connect_errno) {
            echo 'Connection failed: ' . $db->connect_error;
            exit();
        }

        $updateInventory = "UPDATE stocks
            SET   stock_qty  = $qty
            WHERE product_id = $id";

        $db->query($updateInventory);
    }
}
