<?php

use Admin\Admin;
use Customer\Customer;

Session_start();

$sessionId = session_id();

// TODO: fix conditions
if (!empty($_SESSION['customerId'])) {
    $customer = new Customer($_SESSION['customerId']);
} elseif (!empty($_SESSION['adminId'])) {
    $admin = new Admin($_SESSION['adminId']);
}
