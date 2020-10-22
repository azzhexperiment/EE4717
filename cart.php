<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/Session.php');
include_once('models/Auth.php');
include_once('models/connect-db.php');
include_once('models/Cart.php');
include_once('models/Sales.php');


//============================================================================//
// VARIABLES
//============================================================================//

$title = 'Your Cart - CLEO & AZZH Collection: Neue Urban Fashion';

include_once('lang/cart.php');


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/cart.php');
include_once('layouts/common/header.php');

echo '<main>';
include_once('layouts/cart.php');
echo '</main>';

include_once('layouts/common/footer.php');


//============================================================================//
// TERMINATOR
//============================================================================//

include_once('models/disconnect-db.php');
