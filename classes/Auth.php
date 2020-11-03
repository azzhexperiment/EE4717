<?php

namespace Auth;

use mysqli;

/**
 * Authenticate user access.
 *
 * @method void matchCustomer($db)
 * @method void matchAdmin($db)
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */
class Auth
{
    /**
     * Construct new Auth.
     *
     * @param string $type
     * @param string $email
     * @param string $password
     *
     * @return void
     */
    public function __construct($type, $email, $password)
    {
        $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

        // Check connection
        if ($db->connect_errno) {
            echo 'Connection failed: ' . $db->connect_error;
            exit();
        }

        // TODO: Check against session for current login status

        if ($type === 'Customer') {
            $this->matchCustomer($db, $email, $password);
        } elseif ($type === 'Admin') {
            $this->matchAdmin($db, $email, $password);
        }
    }

    /**
     * Match Customer in DB.
     *
     * @param mysqli $db
     * @param string $email
     * @param string $password
     *
     * @return void
     */
    public function matchCustomer($db, $email, $password)
    {
        $seekRecord = "SELECT customer_id FROM auth_customers
            WHERE
                auth_email    = '$email'
            AND
                auth_password = '$password'";

        $customerId = $db->query($seekRecord)->fetch_object();

        if ($customerId > 0) {
            $_SESSION['customerId'] = $customerId->customer_id;
        } else {
            echo '<script>
                alert("Account not found.")
                window.location = "http://192.168.56.2/f37ee/project/user.php"
            </script>';
            exit;
        }
    }

    /**
     * Match Admin in DB.
     *
     * @param mysqli $db
     * @param string $email
     * @param string $password
     *
     * @return void
     */
    public function matchAdmin($db, $email, $password)
    {
        $seekRecord = "SELECT admin_id FROM auth_admin
            WHERE
                auth_email    = '$email'
            AND
                auth_password = '$password'";

        $adminId = $db->query($seekRecord)->fetch_object();

        if ($adminId > 0) {
            $_SESSION['adminId'] = $adminId->admin_id;
        } else {
            echo '<script>
                alert("Back off!! Illegal access attempt logged!!")
                window.location = "http://192.168.56.2/f37ee/project/admin.php"
            </script>';
            exit;
        }
    }
}
