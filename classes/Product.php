<?php

namespace Product;

use mysqli;

/**
 * Product specifications.
 *
 * @property int    $productId
 * @property string $productName
 * @property string $productDescription
 * @property array  $productSize
 * @property float  $productPrice
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */
class Product
{
    public $productId;
    public $productName;
    public $productDescription;
    public $productSize;
    public $productPrice;
    public $productInventory;

    /**
     * Construct product object.
     *
     * @param int $productId
     *
     * @return void
     */
    public function __construct($productId)
    {
        $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

        // Check connection
        if ($db->connect_errno) {
            echo 'Connection failed: ' . $db->connect_error;
            exit();
        }

        $this->productId   = $productId;
        $this->productSize = $this->getProductSizes($db);
        $this->getProductName($db);
        $this->productDescription($db);
        $this->getProductPrices($db);
        $this->getInventory($db);
    }

    /**
     * Get product name from DB.
     *
     * @param mysqli $db
     *
     * @return void
     */
    private function getProductName($db)
    {
        $getProductName = 'SELECT product_name FROM products
            WHERE product_id = ' . $this->productId;

        $this->productName = $db->query($getProductName)
            ->fetch_object()
            ->product_name;
    }

    /**
     * Get product description from DB.
     *
     * @param mysqli $db
     *
     * @return void
     */
    private function productDescription($db)
    {
        $productDescription = 'SELECT product_description FROM products
            WHERE product_id = ' . $this->productId;

        $this->productDescription = $db->query($productDescription)
            ->fetch_object()
            ->product_description;
    }

    /**
     * Get product sizes from DB.
     *
     * @param mysqli $db
     *
     * @return array
     */
    private function getProductSizes($db)
    {
        $getSizingTypeId = 'SELECT sizing_type FROM products
            WHERE product_id = ' . $this->productId;

        $sizingTypeId = (int) $db->query($getSizingTypeId)
            ->fetch_object()
            ->sizing_type;

        if ($sizingTypeId !== 1) {
            $getProductSizeTable = 'SELECT sizing_type FROM sizing_types
                WHERE sizing_type_id = ' . $sizingTypeId;

            $productSizeTable = $db->query($getProductSizeTable)
                ->fetch_object()
                ->sizing_type;

            $getproductSize = 'SELECT size_value FROM ' . $productSizeTable;

            $result = $db->query($getproductSize);

            while ($productSize = $result->fetch_object()->size_value) {
                $productSizes[] = $productSize;
            }

            return $productSizes;
        } else {
            return 'N/A';
        }
    }

    /**
     * Get product price from DB.
     *
     * @param mysqli $db
     *
     * @return void
     */
    private function getProductPrices($db)
    {
        $getProductPrice = 'SELECT product_price FROM products
            WHERE product_id = ' . $this->productId;

        $this->productPrice = $db->query($getProductPrice)
            ->fetch_object()
            ->product_price;
    }

    /**
     * Get inventory from DB.
     *
     * @param mysqli $db
     *
     * @return void
     */
    private function getInventory($db)
    {
        $getInventory = 'SELECT stock_qty FROM stocks
            WHERE product_id = ' . $this->productId;

        $this->productInventory = $db->query($getInventory)
            ->fetch_object()
            ->stock_qty;
    }
}
