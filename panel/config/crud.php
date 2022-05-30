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
        $id = $_GET['id'];
        $image = "SELECT * FROM `posts` WHERE `id` = '$id'";
        $imageresult = $dbconnect->conn->query($image);
        if ($imageresult->num_rows === 1) {
            while ($imagerow = $imageresult->fetch_assoc()) {
                if (file_exists(__DIR__ . '/../../images/' . $imagerow['image'])) {
                    unlink(__DIR__ . '/../../images/' . $imagerow['image']);
                } else {
                    echo __DIR__ . '/../../images/' . $imagerow['image'];
                }
            }
            $deletepost = "DELETE FROM `posts` WHERE `id` = '$id'";
            if ($dbconnect->conn->query($deletepost) === TRUE) {
                echo "განცხადება წარმატებით წაიშალა";
            }
        } else {
            echo "ვერაფერი ვერ მოიძებნა";
        }
    }
}
$crud = new GlobalCrud;
