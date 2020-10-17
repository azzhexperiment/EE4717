<?php

$title = 'CLEO & AZZH Collection: Neue Urban Fashion';

/**
 * Models
 */

include_once('models/auth.php');

// TODO: may not need depending on implementation
// include_once($root . '/models/connect-db.php');

/**
 * Variables
 */

include_once('lang/index.php');

/**
 * Layouts
 */

include_once('layouts/common/header.php');

// START OF MAIN CONTENT

echo '<main>';

include_once('layouts/banner.php');
include_once('layouts/featured.php');
include_once('layouts/categories.php');

echo '</main>';

// END OF MAIN CONTENT

include_once('layouts/common/footer.php');

// include_once($root . '/models/disconnect-db.php');
