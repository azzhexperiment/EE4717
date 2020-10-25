<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/connect-db.php');
include_once('models/Session.php');
include_once('models/Auth.php');
include_once('models/Listings.php');


//============================================================================//
// VARIABLES
//============================================================================//

$title = 'Shop category - CLEO & AZZH Collection: Neue Urban Fashion';

include_once('lang/listings.php');


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/listings.php');
include_once('layouts/common/header.php');

echo '<main>';
include_once('layouts/listings.php');
echo '</main>';

include_once('layouts/common/footer.php');


//============================================================================//
// TERMINATOR
//============================================================================//

include_once('models/disconnect-db.php');
