<?php

use Auth\Auth;
use Customer\Customer;

$loggedIn = '<script>
    alert("You are now logged in.")
    window.location = "http://192.168.56.2/f37ee/project/index.php"
</script>';

$signedUp = '<script>
    alert("Your account has been created and you are automatically logged in.")
    window.location = "http://192.168.56.2/f37ee/project/index.php"
</script>';

$loggedOut = '<script>
    alert("You have been logged out.")
    window.location = "http://192.168.56.2/f37ee/project/index.php"
</script>';

// TODO: Check in session

if (empty($_SESSION['customerId'])) {
    // Redirect user after logging in
    if ($_POST['type'] === 'login') {
        $email    = md5(trim($_POST['login__input-email']));
        $password = md5($_POST['login__input-password']);

        $auth = new Auth('Customer', $email, $password);

        echo $loggedIn;
    }

    // Create new Customer object
    if ($_POST['type'] === 'signup') {
        $customer = new Customer('New');

        echo $signedUp;
    }

    // Route user to appropriate page
    if ($_GET['action'] === 'signup') {
        include_once('user/signup.php');
    } else {
        include_once('user/login.php');
    }
}

// Log user out from session
if ($_GET['action'] === 'logout') {
    // TODO: add log out session commands
    $oldUser = $_SESSION['customerId'];
    unset($_SESSION['customerId']);
    session_destroy();

    if (!empty($oldUser)) {
        echo $loggedOut;
    } else {
        echo '<p>You are not logged in.</p>';
        echo '<p>Click <a href="user.php">HERE</a> to login.</p>';
    }
}

if (!empty($_SESSION['customerId'])) {
    echo '<h1>Welcome, ', $customer->customerName, '</h1>';
    echo '<p>You are already logged in.</p>';
    echo '<p>Click <a href="user.php?action=logout">HERE</a> to log out.</p>';
}
