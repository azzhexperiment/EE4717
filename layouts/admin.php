<?php

/**
 * Admin access.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

use Auth\Auth;

$loggedIn = '<script>
    alert("You are now logged in.")
    window.location = "http://192.168.56.2/f37ee/project/dashboard.php"
</script>';

$loggedOut = '<script>
    alert("You have been logged out.")
    window.location = "http://192.168.56.2/f37ee/project/index.php"
</script>';

if (empty($_SESSION['adminId'])) {
    // Redirect admin after logging in
    if ($_POST['type'] === 'login') {
        $email    = md5(trim($_POST['login__input-email']));
        $password = md5($_POST['login__input-password']);

        $auth = new Auth('Admin', $email, $password);

        echo $loggedIn;
    }

    include_once('admin/login.php');
}

// Log admin out from session
if ($_GET['action'] === 'logout') {
    // TODO: add log out session commands
    $oldAdmin = $_SESSION['adminId'];
    unset($_SESSION['adminId']);
    session_destroy();

    if (!empty($oldAdmin)) {
        echo $loggedOut;
    } else {
        echo '<p>You are not logged in.</p>';
        echo '<p>Click <a href="admin.php">HERE</a> to login.</p>';
    }
}

if (!empty($_SESSION['adminId'])) {
    echo '<h1 class="user__title">Howdy, partner!</h1>';
    echo '<p>You are already logged in.</p>';
    echo '<p>Click <a href="dashboard.php">HERE</a> to visit dashboard.</p>';
    echo '<p>Click <a href="admin.php?action=logout">HERE</a> to log out.</p>';
}
