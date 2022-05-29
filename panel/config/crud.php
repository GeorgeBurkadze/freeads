<?php
use Crud as GlobalCrud;

class Crud
{
    public function index()
    {
        require_once __DIR__ . "/connect.php";
        $posts = "SELECT * FROM `posts` ORDER BY `id` DESC";
        $postsresult = $dbconnect->conn->query($posts);
        $json_array = array();
        if ($postsresult->num_rows > 0) {
            while ($postsrow = $postsresult->fetch_assoc()) {
                $json_array[] = $postsrow;
            }
        }
        echo json_encode($json_array);
    }

    public function deletepost()
    {
        require_once __DIR__ . "/connect.php";
        $id = $_GET['postid'];
        $image = "SELECT `image` FROM `posts` WHERE `id` = '$id'";
        $imageresult = $dbconnect->conn->$image;
        while ($imagerow = $imageresult->fetch_assoc()) {
            unlink(__DIR__ . '/images/' . $imagerow);
        }
        $deletepost = "DELETE FROM `posts` WHERE `id` = '$id'";
        if ($dbconnect->conn->query($deletepost) === TRUE) {
            echo "განცხადება წარმატებით წაიშალა";
        }
    }
}
$crud = new GlobalCrud;
