<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/connect-db.php');
include_once('models/Session.php');
include_once('models/Auth.php');
include_once('models/Cart.php');
include_once('models/Product.php');


//============================================================================//
// VARIABLES
//============================================================================//

$title = 'Shop product - CLEO & AZZH Collection';

include_once('lang/listings.php');


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
