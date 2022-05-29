<?php
class Insert
{
    public function __construct()
    {
        require_once __DIR__ . "/crud.php";
        $crud->insert();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $insert = new Insert();
}