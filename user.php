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

include_once('models/Session.php');


//============================================================================//
// VARIABLES
//============================================================================//

$title = 'Customer - CLEO & AZZH Collection: Neue Urban Fashion';

include_once('lang/user.php');


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/user.php');
include_once('layouts/common/header.php');

echo '<main>';
include_once('layouts/user.php');
echo '</main>';

include_once('layouts/common/footer.php');


//============================================================================//
// TERMINATOR
//============================================================================//

include_once('models/disconnect-db.php');
