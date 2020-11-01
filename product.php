<?php

//============================================================================//
// CLASSES
//============================================================================//

include_once('classes/Auth.php');
include_once('classes/Customer.php');
include_once('classes/Cart.php');
include_once('classes/Product.php');
include_once('classes/Sales.php');
include_once('classes/Mail.php');


//============================================================================//
// MODELS
//============================================================================//

include_once('models/connect-db.php');
include_once('models/Session.php');
include_once('models/Product.php');

$title = 'Shop product - CLEO & AZZH Collection';


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/product.php');
include_once('layouts/common/header.php');

echo '<main>';
include_once('layouts/product.php');
echo '</main>';

include_once('layouts/common/footer.php');


//============================================================================//
// TERMINATOR
//============================================================================//

include_once('models/disconnect-db.php');
