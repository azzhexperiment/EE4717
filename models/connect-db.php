<?php

/**
 * Establish DB connection.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

$db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

// Check connection
if ($db->connect_errno) {
    echo 'Connection failed: ' . $db->connect_error;
    exit();
}
