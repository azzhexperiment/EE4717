<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/Session.php');
include_once('models/Auth.php');


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
