<?php

/**
 * Write user feedback into DB table.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

if (isset($_POST)) {
    // Data cleaning
    $name = $db->real_escape_string($_POST['contact__input-name']);
    $email = $db->real_escape_string($_POST['contact__input-email']);
    $queryType = $db->real_escape_string($_POST['contact__input-type']);
    $message = $db->real_escape_string($_POST['contact__input-message']);

    $newFeedback = 'INSERT INTO feedbacks
        (feedback_name, feedback_email, feedback_type, feedback_message)
        VALUES
            (
                "' . $name      . '" ,
                "' . $email     . '" ,
                "' . $queryType . '" ,
                "' . $message   . '"
            )';

    if (!$result = $db->query($newFeedback)) {
        die('Error: ' . $db->error);
    }
}
