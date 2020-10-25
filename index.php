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

$title = 'CLEO & AZZH Collection: Neue Urban Fashion';

include_once('lang/index.php');


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/index.php');
include_once('layouts/common/header.php');

echo '<main>';
include_once('layouts/banner.php');
include_once('layouts/featured.php');
include_once('layouts/categories.php');
echo '</main>';

include_once('layouts/common/footer.php');
