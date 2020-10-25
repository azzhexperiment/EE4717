<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/connect-db.php');
include_once('models/Session.php');
include_once('models/Auth.php');
include_once('models/Contact.php');


//============================================================================//
// VARIABLES
//============================================================================//

$title = 'Contact Us - CLEO & AZZH Collection: Neue Urban Fashion';


//============================================================================//
// LAYOUTS
//============================================================================//

include_once('layouts/common/head.php');
include_once('layouts/js/contact.php');
include_once('layouts/common/header.php');

echo '<main>';
include_once('layouts/contact.php');
echo '</main>';

include_once('layouts/common/footer.php');


//============================================================================//
// TERMINATOR
//============================================================================//

include_once('models/disconnect-db.php');
