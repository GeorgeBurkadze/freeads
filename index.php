<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>უფასო რეკლამა</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" id="stylecss">
</head>
<body>
    <div class="minicontainer">
        <div class="card">
            <div class="card-header">განცხადების დამატება</div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="image" class="form-label">ატვირთეთ იმის ფოტო რისი რეკლამაც გსურთ</label>
                        <input type="file" name="image" id="image" class="form-control" accept=".jpg, .jpeg, .png">
                        <div id="imageerror">
                            <?php
                            require_once __DIR__ . "/config/insert.php";
                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($imagemsg)) {
                                echo $imagemsg;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">ჩაწერეთ თქვენი სახელი და გვარი</label>
                        <input type="text" name="fullname" id="fullname" class="form-control">
                        <div id="fullnameerror"></div>
                    </div>
                    <div class="mb-3">
                        <label for="post" class="form-label">ჩაწერეთ თქვენი განცხადება</label>
                        <textarea name="post" id="post" rows="5" class="form-control"></textarea>
                        <div id="posterror"></div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success" id="uploadbutton">ატვირთეთ</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">განცხადებები</div>
            <div class="card-body" id="posts"></div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script id="mainjs"></script>
    <script src="./js/linkfiles.js"></script>
</body>
</html>