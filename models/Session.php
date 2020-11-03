<?php

/**
 * Manage login status.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

use Customer\Customer;

// not in use
Session_start();
// not in use
$sessionId = session_id();

// TODO: fix conditions
if (!empty($_SESSION['customerId'])) {
    $customer = new Customer($_SESSION['customerId']);
}
