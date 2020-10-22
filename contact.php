<?php

//============================================================================//
// MODELS
//============================================================================//

include_once('models/Session.php');
include_once('models/Auth.php');
include_once('models/connect-db.php');
include_once('models/Contact.php');
include_once('models/disconnect-db.php');


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

// START OF MAIN CONTENT

echo '<main>';

include_once('layouts/contact.php');

echo '</main>';

// START OF MAIN CONTENT

include_once('layouts/common/footer.php');
