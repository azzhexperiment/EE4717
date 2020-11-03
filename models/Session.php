<?php

/**
 * Manage login status.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

use Customer\Customer;

Session_start();
$sessionId = session_id();

if (!empty($_SESSION['customerId'])) {
    $customer = new Customer($_SESSION['customerId']);
}
