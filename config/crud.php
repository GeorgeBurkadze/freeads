<?php
class Crud
{
    public function index()
    {
        require_once __DIR__ . "/connect.php";
        $posts = "SELECT * FROM `posts` WHERE `status` = 'published' ORDER BY `id` DESC";
        $postsresult = $dbconnect->conn->query($posts);
        $json_array = array();
        if ($postsresult->num_rows > 0) {
            while ($postsrow = $postsresult->fetch_assoc()) {
                $json_array[] = $postsrow;
            }
        }
        echo json_encode($json_array);
    }

    public function insert()
    {
        require_once __DIR__ . "/connect.php";
        $imagename = $_FILES['image']['name'];
        $imagetmp = $_FILES['image']['tmp_name'];
        $imagepath = strtolower(pathinfo($imagename, PATHINFO_EXTENSION));
        $fullname = htmlspecialchars($_POST['fullname']);
        $post = htmlspecialchars($_POST['post']);
        $newname = date('YmdHis') . rand(0, 9999999) . '.' . $imagepath;
        if (empty($imagename) || $imagepath !== 'jpg' && $imagepath !== 'jpeg' && $imagepath !== 'png' || empty($fullname) || empty($post)) {
            if (empty($imagename)) {
                echo '<div><b class="text-danger">ფოტო სავალდებულოა</b></div>';
            } elseif ($imagepath !== 'jpg' && $imagepath !== 'jpeg' && $imagepath !== 'png') {
                echo '<div><b class="text-danger">თქვენ შეგიძლიათ ატვირთოთ მხოლოდ ფოტოები</b></div>';
            }
            if (empty($fullname)) {
                echo '<div><b class="text-danger">სახელი და გვარი სავალდებულოა</b></div>';
            }
            if (empty($post)) {
                echo '<div><b class="text-danger">პოსტი სავალდებულოა</b></div>';
            }
        } else {
            $insert = "INSERT INTO `posts`(`postby`,`post`,`image`)VALUES('$fullname','$post','$newname')";
            if ($dbconnect->conn->query($insert) === TRUE) {
                if (move_uploaded_file($imagetmp, './images/' . $newname)) {
                    echo '<div><b class="text-success">თქვენი განცხადება წარმატებით გაეგზავნა ადმინისტრაციას განსახილველად</b></div>';
                }
            } else {
                echo $insert . ' ' . $dbconnect->conn->error;
            }
        }
    }
}
$crud = new Crud;