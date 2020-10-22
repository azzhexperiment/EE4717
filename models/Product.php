<?php

/**
 * Product operations.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

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
 */
class Product
{
    public $productId;
    public $productName;
    public $productDescription;
    public $productSize;
    public $productPrice;

    /**
     * Construct product object.
     *
     * @param mysqli $db
     * @param int    $productId
     *
     * @return void
     */
    public function __construct($db, $productId)
    {
        $this->productId          = $productId;
        $this->productName        = $this->getProductName($db);
        $this->productDescription = $this->productDescription($db);
        $this->productSize        = $this->getProductSize($db);
        $this->productPrice       = $this->getProductPrices($db);
    }

    /**
     * Get product name from DB.
     *
     * @param mysqli $db
     *
     * @return string
     */
    public function getProductName($db)
    {
        $getProductName = 'SELECT product_name FROM products
            WHERE product_id = ' . $this->productId;

        $productName = $db
            ->query($getProductName)
            ->fetch_object()
            ->product_name;

        return $productName;
    }

    /**
     * Get product description from DB.
     *
     * @param mysqli $db
     *
     * @return string
     */
    public function productDescription($db)
    {
        $productDescription = 'SELECT product_description FROM products
            WHERE product_id = ' . $this->productId;

        $productDescription = $db
            ->query($productDescription)
            ->fetch_object()
            ->product_description;

        return $productDescription;
    }

    /**
     * Get product sizes from DB.
     *
     * @param mysqli $db
     *
     * @return array
     */
    public function getProductSize($db)
    {
        $getSizingTypeId = 'SELECT sizing_type FROM products
            WHERE product_id = ' . $this->productId;

        $sizingTypeId = (int) $db
            ->query($getSizingTypeId)
            ->fetch_object()
            ->sizing_type;

        if ($sizingTypeId !== 1) {
            $getProductSizeTable = 'SELECT sizing_type FROM sizing_types
                WHERE sizing_type_id = ' . $sizingTypeId;

            $productSizeTable = $db
                ->query($getProductSizeTable)
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
     * @return float
     */
    public function getProductPrices($db)
    {
        $getProductPrice = 'SELECT product_price FROM products
            WHERE product_id = ' . $this->productId;

        $productPrice = $db
            ->query($getProductPrice)
            ->fetch_object()
            ->product_price;

        return $productPrice;
    }

    // TODO: get inventory size from DB
    /**
     * Get inventory from DB.
     *
     * @param mysqli $db
     *
     * @return float
     */
    public function getInventory($db)
    {
        $getProductPrice = 'SELECT product_price FROM products
            WHERE product_id = ' . $this->productId;

        $productPrice = $db
            ->query($getProductPrice)
            ->fetch_object()
            ->product_price;

        return $productPrice;
    }
}
