<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/connect-db.php');
include_once('models/Session.php');
include_once('models/Auth.php');
include_once('models/User.php');


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
