<?php

//============================================================================//
// CLASSES
//============================================================================//

include_once('classes/Auth.php');
include_once('classes/Customer.php');
include_once('classes/Cart.php');
include_once('classes/Product.php');
include_once('classes/Sales.php');


//============================================================================//
// MODELS
//============================================================================//

include_once('models/connect-db.php');
include_once('models/Session.php');
include_once('models/Cart.php');

$title = 'Your Cart - CLEO & AZZH Collection: Neue Urban Fashion';


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
