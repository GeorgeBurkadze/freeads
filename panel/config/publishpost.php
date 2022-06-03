<?php
session_start();
class Deletepost
{
    public function __construct()
    {
        $id = $_GET['id'];
        require_once __DIR__ . "/crud.php";
        if (!empty($id)) {
            $crud->publishpost();
        } else {
            echo "აიდი ვერ მოიძებნა";
        }
    }
}
if (isset($_SESSION['admin'])) {
    $deletepostfunction = new Deletepost();
} else {
    echo 'თქვენ არ სარგებლობთ ადმინისტრატორის უფლებებით';
}
