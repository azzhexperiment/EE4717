<?php

namespace Mail;

use mysqli;

/**
 * Mail
 */
class Mail
{
    public function __construct($sale)
    {
        $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

        // Check connection
        if ($db->connect_errno) {
            echo 'Connection failed: ' . $db->connect_error;
            exit();
        }

        $customer = $this->getCustomerInfo($db, $sale->customerId);

        $fromName  = "Cleo and Azzh";
        $fromEmail = "f37ee@localhost";
        $to        = "f37ee@localhost";

        $headers = 'From: ' . $fromName . ' <' . $fromEmail . '>' . "\r\n"
            . 'Reply-To: ' . $fromEmail . "\r\n"
            . 'X-Mailer: PHP/' . phpversion();

        $subject = 'Confirmation of Purchase - Thank you for Shopping with us!';
        $message = $this->message($customer, $sale);

        mail($to, $subject, $message, $headers, '-ff37ee@localhost');
    }

    /**
     * Email body.
     *
     * @param object $customer
     *
     * @return void
     */
    private function message($customer, $sale)
    {
        // $customerFirstName = $customer->customer_first_name;

        $message = 'Dear ' . $customer->customer_first_name . ',' . "\r\n\r\n"
            . 'Thank you for shopping with us!'                   . "\r\n\r\n"
            . 'You have purchased the following items:'           . "\r\n\r\n";

        for ($i = 0; $i < count($sale->productId); $i++) {
            $qty = ltrim($sale->productOrderQty[$i], 0);
            if ($sale->productSize[$i] !== 'N/A') {
                $message .= '  ' . ($i + 1) . '.'
                    . $sale->productName[$i]                       . "\r\n"
                    . '  Size: '      . $sale->productSize[$i]     . "\r\n"
                    . '  Qty: '       . $qty                       . "\r\n"
                    . '  Subtotal: $' . $sale->productSubtotal[$i] . "\r\n\r\n";
            } else {
                $message .= '  ' . ($i + 1) . '.'
                    . $sale->productName[$i]                       . "\r\n"
                    . '  Qty: '       . $qty                       . "\r\n"
                    . '  Subtotal: $' . $sale->productSubtotal[$i] . "\r\n\r\n";
            }
        }

        $message .= '  TOTAL'                                     . "\r\n"
            . '  $' . $sale->productTotal                         . "\r\n\r\n"
            . 'Your purchases will be shipped to your address:'   . "\r\n"
            . '  ' . $customer->customer_address_1                . "\r\n"
            . '  ' . $customer->customer_address_2                . "\r\n"
            . '  ' . $customer->customer_country                  . "\r\n"
            . '  ' . $customer->customer_city                     . "\r\n"
            . '  ' . $customer->customer_postal;

        return $message;
    }

    /**
     * Get customer information.
     *
     * @param mysqli $db
     * @param int    $customerId
     *
     * @return object
     */
    private function getCustomerInfo($db, $customerId)
    {
        $getCustomerInfo = "SELECT * FROM customers
            WHERE customer_id = $customerId";

        return $db->query($getCustomerInfo)->fetch_object();
    }
}
