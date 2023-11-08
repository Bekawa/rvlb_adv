<?php
class ImageUpload
{
    private $file = "";
    private $file_size = "";
    private $file_name = "";
    private $tmp_name = "";
    private $error = "";
    private $img_upload_path = "";

    function FileChecker()
    {

        if (isset($_POST["submit"]) && !empty($_POST["submit"])) {

            $this->file = $_FILES["file_data"]['name'];
            $this->file = $_FILES['file_data'];
            print_r($this->file);
            echo "<br>";

            $this->file_size = $_FILES['file_data']['size'];
            $this->tmp_name = $_FILES['file_data']['tmp_name'];
            $this->error = $_FILES['file_data']['error'];
            if ($this->error === 0) {
                echo $this->error;



















            }
        }
    }
}
$file_uploader = new ImageUpload();
$file_uploader->FileChecker();

/*
<?php

include("./config/app.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body> 

<form method="post" action="function.php" enctype="multipart/form-data">
<input type="text" name="file_name" >
<input type="file" name="file_data">
<input type="submit" name="submit">
</form>

</body>
</html> */
