<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/Session.php');
include_once('models/Auth.php');


//============================================================================//
// VARIABLES
//============================================================================//

$title = 'Career - CLEO & AZZH Collection: Neue Urban Fashion';

include_once('lang/career.php');


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/career.php');
include_once('layouts/common/header.php');

echo '<main>';
include_once('layouts/career.php');
echo '</main>';

include_once('layouts/common/footer.php');
