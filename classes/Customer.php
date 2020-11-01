<?php

namespace Customer;

use Auth\Auth;
use mysqli;

/**
 * Customer Class handles registration of new customers and
 * retrieval of registered customer information.
 *
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $address1
 * @property string $address2
 * @property string $country
 * @property string $city
 * @property int    $postal
 *
 * @method void createNewCustomer()
 * @method void retrieveCustomerInfo()
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */
class Customer
{
    public $customerId;
    public $firstName;
    public $lastName;
    public $email;
    public $address1;
    public $address2;
    public $country;
    public $city;
    public $postal;

    /**
     * Construct new Customer object
     *
     * @param string $customerId
     *
     * @return void
     */
    public function __construct($customerId)
    {
        $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

        // Check connection
        if ($db->connect_errno) {
            echo 'Connection failed: ' . $db->connect_error;
            exit();
        }

        if ($customerId === 'New') {
            $this->createNewCustomer($db);
            $this->autoLogin($db);
        } else {
            $this->retrieveCustomerInfo($db, $customerId);
            $this->autoLogin($db);
        }
    }

    /**
     * Create entry in customers and auth_customers for new customer sign up.
     *
     * @param mysqli $db
     *
     * @return void
     */
    public function createNewCustomer($db)
    {
        $this->firstName = trim($_POST['signup__input-first-name']);
        $this->lastName  = trim($_POST['signup__input-last-name']);
        $this->email     = trim($_POST['signup__input-email']);
        $this->address1  = trim($_POST['signup__input-address-1']);
        $this->address2  = trim($_POST['signup__input-address-2']);
        $this->country   = trim($_POST['signup__input-country']);
        $this->city      = trim($_POST['signup__input-city']);
        $this->postal    = trim($_POST['signup__input-postal']);

        $password1 = $_POST['signup__input-password-1'];
        $password2 = $_POST['signup__input-password-2'];

        if ($password1 !== $password2) {
            echo 'Passwords do not match!';
            exit;
        }

        // Safety net
        if (!get_magic_quotes_gpc()) {
            $this->firstName = addslashes($this->firstName);
            $this->lastName  = addslashes($this->lastName);
            $this->email     = addslashes($this->email);
            $this->address1  = addslashes($this->address1);
            $this->address2  = addslashes($this->address2);
            $this->country   = addslashes($this->country);
            $this->city      = addslashes($this->city);
            $this->postal    = addslashes($this->postal);
        }

        $insertNewCustomer = "INSERT INTO customers
            VALUES (
                DEFAULT,
                '$this->firstName',
                '$this->lastName' ,
                '$this->email'    ,
                '$this->address1' ,
                '$this->address2' ,
                '$this->country'  ,
                '$this->city'     ,
                '$this->postal'   ,
                CURRENT_TIMESTAMP ,
                NULL
            )";

        $db->query($insertNewCustomer);

        // Get id from last insert query
        $this->customerId = $db->insert_id;

        $email    = md5($this->email);
        $password = md5($password1);

        $insertLoginCredential = "INSERT INTO auth_customers
            VALUES (
                DEFAULT,
                '$this->customerId',
                '$email'           ,
                '$password'        ,
                CURRENT_TIMESTAMP  ,
                NULL
            )";

        $db->query($insertLoginCredential);
    }

    /**
     * Retrieve customer info from DB.
     *
     * @param mysqli $db
     * @param int    $customerId
     *
     * @return void
     */
    public function retrieveCustomerInfo($db, $customerId)
    {
        $retrieveCustomerInfo = "SELECT * FROM customers
            WHERE customer_id = $customerId";

        $customerInfo = $db->query($retrieveCustomerInfo)->fetch_object();

        $this->firstName = $customerInfo->customer_first_name;
        $this->lastName  = $customerInfo->customer_last_name;
        $this->email     = $customerInfo->customer_email;
        $this->address1  = $customerInfo->customer_address_1;
        $this->address2  = $customerInfo->customer_address_2;
        $this->country   = $customerInfo->customer_country;
        $this->city      = $customerInfo->customer_city;
        $this->postal    = $customerInfo->customer_postal;
    }

    /**
     * Auto login customer after account creation.
     *
     * @param mysqli $db
     *
     * @return void
     */
    public function autoLogin($db)
    {
        $email    = md5($this->email);
        $password = md5($_POST['signup__input-password-1']);

        new Auth($db, 'Customer', $email, $password);
    }
}
