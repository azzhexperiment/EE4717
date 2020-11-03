<?php

/**
 * Write user feedback into DB table.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

if (!empty($_POST)) {
    // Data cleaning
    $name      = $db->real_escape_string($_POST['contact__input-name']);
    $email     = $db->real_escape_string($_POST['contact__input-email']);
    $queryType = $db->real_escape_string($_POST['contact__input-type']);
    $message   = $db->real_escape_string($_POST['contact__input-message']);

    $newFeedback = 'INSERT INTO feedbacks
        VALUES
            (
                DEFAULT,
                "' . $name      . '",
                "' . $email     . '",
                "' . $queryType . '",
                "' . $message   . '",
                CURRENT_TIMESTAMP,
                NULL
            )';

    if (!$result = $db->query($newFeedback)) {
        die('Error: ' . $db->error);
    }

    $_POST = [];

    echo '<script>
        alert("Your feedback has been submitted.")
        window.location = "http://192.168.56.2/f37ee/project/contact.php"
    </script>';
}
