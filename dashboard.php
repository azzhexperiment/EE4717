<?php

//============================================================================//
// CLASSES
//============================================================================//

include_once('classes/Auth.php');
include_once('classes/Admin.php');
include_once('classes/Dashboard.php');
include_once('classes/Cart.php');
include_once('classes/Product.php');
include_once('classes/Sales.php');


//============================================================================//
// MODELS
//============================================================================//

include_once('models/connect-db.php');
include_once('models/Session.php');
include_once('models/Dashboard.php');

$title = 'Dashboard - CLEO & AZZH Collection: Neue Urban Fashion';


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/dashboard.php');
include_once('layouts/common/header.php');

echo '<main>';
include_once('layouts/dashboard.php');
echo '</main>';

include_once('layouts/common/footer.php');


//============================================================================//
// TERMINATOR
//============================================================================//

include_once('models/disconnect-db.php');
