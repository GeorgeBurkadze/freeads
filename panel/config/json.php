<?php
session_start();
use JSON as GlobalJSON;

class JSON
{
    public function __construct()
    {
        require_once __DIR__ . "/crud.php";
        $crud->index();
    }
}
if (isset($_SESSION['admin'])) {
    $json = new GlobalJSON();
} else {
    echo '[{"postby":"ადმინისტრატორი","post":"თქვენ არ გაქვთ ადმინისტრატორის უფლებები","image":"403.png"}]';
}
