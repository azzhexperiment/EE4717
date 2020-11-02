<?php

/**
 * Retrieve listings from DB given filters set in _GET.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

$filter = '';

if ($_GET['cat'] === 'male') {
    $filter = 'WHERE product_category < 200';
} elseif ($_GET['cat'] === 'female') {
    $filter = 'WHERE product_category > 200';
} elseif ($_GET['cat'] === 'featured') {
    $filter = 'WHERE is_featured = TRUE';
} elseif ($_GET['cat'] === 'new') {
    $filter = 'WHERE is_new = TRUE';
}

$getListings = 'SELECT * FROM products ' . $filter;

$result = $db->query($getListings);

while ($listing = $result->fetch_object()) {
    $listings[] = $listing;
}
