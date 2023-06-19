<?php
    session_start();
    $db_connection = mysqli_connect("localhost","root","","3ch_db");
    $dirpath = "../images/";
    $filename = $_FILES["UserPic"]["name"];
    $target_file = $dirpath . basename($_FILES["UserPic"]["name"]);
    $uploaded = 1;
    $imagefiletype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submitbutton"])) {
        $check = getimagesize($_FILES["UserPic"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image";
            $uploaded = 1;
        } else {
            echo "File is not an image";
            $uploaded = 0;
        }
    }
    if($imagefiletype != "jpg" && $imagefiletype != "png" && $imagefiletype != "jpeg") {
        echo "Only JPG, JPEG, PNG files are allowed";
        $uploaded = 0;
    }

    if (file_exists($target_file)) {
        echo "File already exists";
    $uploaded = 0;
    }

    if ($uploaded == 0) {
        echo "File was not uploaded";
    }
    else {
        if (move_uploaded_file($_FILES["UserPic"]["tmp_name"], $target_file)) {
            echo "File was uploaded";
        }
        else {
            echo "File was not uploaded";
        }
    }
    $currentuserid = $_SESSION["currentuserid"];
    $query = mysqli_query($db_connection,"UPDATE User SET UserPicName = '$filename' WHERE UserID = '$currentuserid'");

    header('Location: account_info_panel.php');
?>

