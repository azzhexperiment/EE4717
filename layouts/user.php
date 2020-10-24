<?php

// Route user to appropriate page.

if ($_GET['action'] === 'signup') {
    include_once('user/signup.php');
} else {
    include_once('user/login.php');
}
