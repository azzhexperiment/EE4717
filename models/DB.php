<?php

/**
 * DB object.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0.0
 */

namespace DB;

use mysqli;

class DB extends mysqli
{
    public function __construct()
    {
        $this = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

        // Check connection
        if ($this->connect_errno) {
            echo 'Connection failed: ' . $this->connect_error;
            exit();
        }
    }

    public function __destruct()
    {
        $this->close();
    }
}
