<?php

/**
 * Retrieve dashboard.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

use Dashboard\Dashboard;

$loggedOut = '<script>
    alert("You have been logged out.")
    window.location = "http://192.168.56.2/f37ee/project/index.php"
</script>';

$warning = '<script>
    alert("Illegal access! Your IP has been logged and admin is notified! Now scram!")
    window.location = "http://192.168.56.2/f37ee/project/index.php"
</script>';

$updateSuccess = '<script>
    alert("Inventory updated.")
    window.location = "http://192.168.56.2/f37ee/project/dashboard.php"
</script>';

$dashboard = new Dashboard();

if (!empty($_SESSION['adminId'])) {
    if ($_POST['qty']) {
        for ($i = 0; $i < count($_POST['qty']); $i++) {
            $dashboard->updateInventory(
                $dashboard->inventory['id'][$i],
                $_POST['qty'][$i]
            );
        }

        unset($_POST);
        echo $updateSuccess;
    }

    if ($_GET['action'] === 'logout') {
        $oldUser = $_SESSION['adminId'];
        unset($_SESSION['adminId']);
        session_destroy();

        if (!empty($oldUser)) {
            echo $loggedOut;
        }
    }
} else {
    echo $warning;
}
