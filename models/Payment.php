<?php

use Sales\Sales;

$directHome = '<script type="text/javascript">
    alert("Thank you for shopping with us!")
    window.location = "http://192.168.56.2/f37ee/project/index.php"
</script>';

if (isset($_POST['buy'])) {
    $_SESSION['productId']       = [];
    $_SESSION['productSize']     = [];
    $_SESSION['productOrderQty'] = [];

    for ($i = 0; $i < count($_POST['productId']); $i++) {
        $_SESSION['productId'][$i]       = $_POST['productId'][$i];
        $_SESSION['productSize'][$i]     = $_POST['productSize'][$i];
        $_SESSION['productOrderQty'][$i] = $_POST['productOrderQty'][$i];
    }
}

if (isset($_POST['confirm'])) {
    $sales = new Sales();

    echo $directHome;
}
