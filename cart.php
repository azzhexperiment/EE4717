<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/Interfaces/DBActions.php');
include_once('models/Interfaces/CartActions.php');
include_once('models/Interfaces/SalesActions.php');

// include_once('models/Session.php');
include_once('models/Auth.php');
// include_once('models/connect-db.php');
include_once('models/DB.php');
include_once('models/Cart.php');


//============================================================================//
// VARIABLES
//============================================================================//

$title = 'Shop category - CLEO & AZZH Collection: Neue Urban Fashion';

include_once('lang/cart.php');


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/cart.php');
include_once('layouts/common/header.php');

// START OF MAIN CONTENT

echo '<main>';

include_once('layouts/cart.php');

echo '</main>';

// START OF MAIN CONTENT

include_once('layouts/common/footer.php');

include_once('models/disconnect-db.php');
