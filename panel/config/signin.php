<?php
session_start();
class Signin
{
    public function __construct()
    {
        require_once __DIR__ . "/connect.php";
        $signindata = file_get_contents("php://input", true);
        $decodeddata = json_decode($signindata);
        $username = htmlspecialchars($decodeddata->username);
        $password = htmlspecialchars(md5($decodeddata->password));
        if (empty($username) || empty($password)) {
            echo "იუზერნეიმი და პაროლი სავალდებულოა";
        } else {
            $signin = "SELECT * FROM `admins` WHERE `username` = '$username' AND `password` = '$password'";
            $signinresult = $dbconnect->conn->query($signin);
            if ($signinresult->num_rows === 1) {
                $_SESSION['admin'] = $username;
            } else {
                echo "იუზერნეიმი ან/და პაროლი არასწორია";
            }
        }
    }
}
if (isset($_SESSION['admin'])) {
    echo "უკვე სარგებლობთ ადმინისტრატორის უფლებებით";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $signin = new Signin();
}