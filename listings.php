<?php

$root = __DIR__;

$title = 'Shop category - CLEO & AZZH Collection: Neue Urban Fashion';

/**
 * Models
 */

include_once($root . '/models/auth.php');
// include('model/connect-db.php');

/**
 * Variables
 */

include_once($root . '/lang/listings.php');

/**
 * Layouts
 */

include_once($root . '/layouts/common/header.php');
include_once($root . '/layouts/listings/main.php');
include_once($root . '/layouts/common/footer.php');
