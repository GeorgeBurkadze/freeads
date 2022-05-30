<?php
class Deletepost
{
    public function __construct()
    {
        require_once "./crud.php";
        $crud->deletepost();
    }
}
if (isset($_SESSION['admin'])) {
    $deletepostfunction = new Deletepost();
} else {
    echo 'თქვენ არ სარგებლობთ ადმინისტრატორის უფლებებით';
}
