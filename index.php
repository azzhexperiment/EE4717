<?php

$root = __DIR__;

$title = 'CLEO & AZZH Collection: Neue Urban Fashion';

/**
 * Models
 */

include_once($root . '/models/auth.php');

// TODO: may not need depending on implementation
// include_once($root . '/models/connect-db.php');

/**
 * Variables
 */

include_once($root . '/lang/index.php');

/**
 * Layouts
 */

include_once($root . '/layouts/common/header.php');
include_once($root . '/layouts/index/main.php');
include_once($root . '/layouts/common/footer.php');

// include_once($root . '/models/disconnect-db.php');
