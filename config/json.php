<?php
class JSON
{
    public function __construct()
    {
        require_once __DIR__ . "/crud.php";
        $crud->index();
    }
}
$json = new JSON();
