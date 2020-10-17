<?php

/**
 * Models
 */

include_once('models/auth.php');
// include('model/connect-db.php');
$listingNum = 10;

/**
 * Variables
 */

$title = 'Shop category - CLEO & AZZH Collection: Neue Urban Fashion';

include_once('lang/listings.php');


/**
 * Layouts
 */

include_once('layouts/common/header.php');

// START OF MAIN CONTENT

echo '<main>';

include_once('layouts/listings.php');

echo '</main>';

// START OF MAIN CONTENT

include_once('layouts/common/footer.php');
