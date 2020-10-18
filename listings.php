<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/auth.php');
// include('model/connect-db.php');
$listingNum = 10;


//============================================================================//
// VARIABLES
//============================================================================//

$title = 'Shop category - CLEO & AZZH Collection: Neue Urban Fashion';

include_once('lang/listings.php');


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/listings.php');
include_once('layouts/common/header.php');

// START OF MAIN CONTENT

echo '<main>';

include_once('layouts/listings.php');

echo '</main>';

// START OF MAIN CONTENT

include_once('layouts/common/footer.php');

// include_once($root . '/models/disconnect-db.php');
