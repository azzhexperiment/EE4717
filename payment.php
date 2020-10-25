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


//============================================================================//
// VARIABLES
//============================================================================//

$title = 'Payment - CLEO & AZZH Collection: Neue Urban Fashion';

include_once('lang/payment.php');


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/payment.php');
include_once('layouts/common/header.php');

echo '<main>';
include_once('layouts/payment.php');
echo '</main>';

include_once('layouts/common/footer.php');


//============================================================================//
// TERMINATOR
//============================================================================//

include_once('models/disconnect-db.php');
