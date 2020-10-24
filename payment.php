<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/Session.php');
include_once('models/Auth.php');
include_once('models/connect-db.php');
include_once('models/Cart.php');
include_once('models/Sales.php');
include_once('models/Payment.php');


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
