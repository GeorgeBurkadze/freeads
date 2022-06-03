<?php

use Connect as GlobalConnect;

define('DB_HOST', 'sql307.epizy.com');
define('DB_USER', 'epiz_31026483');
define('DB_PASSWORD', '53t57QgCxhpI');
define('DB_NAME', 'epiz_31026483_ufasoreklama');

// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASSWORD', 'George@2059');
// define('DB_NAME', 'freeads');

class Connect
{
    public $conn;
    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->conn->connect_error) {
            die($this->conn->connect_error);
        }
    }
}
$dbconnect = new GlobalConnect();