<?php

/**
 * Retrieve listings from DB given filters set in _GET.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

// Retrieve filters
$productSexFilter   = (int) $_GET['sex']   ? $_GET['sex']   : 0;
$productClassFilter = (int) $_GET['class'] ? $_GET['class'] : 0;
$productTypeFilter  = (int) $_GET['type']  ? $_GET['type']  : 0;

// Calculate product category
$categoryId = (int) $productSexFilter + $productClassFilter + $productTypeFilter;

if ($categoryId > 0) {
    // Get filtered listings
    $filters = 'product_category = ' . $categoryId;

    $getListings = 'SELECT * FROM products WHERE' . $filters;
} else {
    // Get all listings
    $getListings = 'SELECT * FROM products';
}

$result = $db->query($getListings);

while ($listing = $result->fetch_object()) {
    $listings[] = $listing;
}
