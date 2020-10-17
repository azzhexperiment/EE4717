<?php

/**
 * Models
 */

include_once('models/auth.php');
// include('model/connect-db.php');

/**
 * Variables
 */

$title = 'Career - CLEO & AZZH Collection: Neue Urban Fashion';

include_once('lang/career.php');


/**
 * Layouts
 */

include_once('layouts/common/head.php');
include_once('layouts/scripts/career.php');
include_once('layouts/common/header.php');

// START OF MAIN CONTENT

echo '<main>';

include_once('layouts/career.php');

echo '</main>';

// START OF MAIN CONTENT

include_once('layouts/common/footer.php');
