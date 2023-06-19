<?php
session_start();
$db_connection = mysqli_connect("localhost","root","","3ch_db");
$comment = $_GET["comment"];
$userid = $_SESSION["currentuserid"];
$userwaslogged = 0;
if(isset($_SESSION['currentuserid'])){
    $userwaslogged = 1;
    $query = mysqli_query($db_connection,"INSERT INTO commentary(CommentText,CreationDate,CreatedByUserID,IntopicID,UserWasLogged,CreatedByUserName) VALUES('$comment',NOW(),'{$_SESSION["currentuserid"]}','{$_SESSION["currenttopicid"]}','$userwaslogged','{$_SESSION["currentusername"]}')");
}
else{
    $query = mysqli_query($db_connection,"INSERT INTO commentary(CommentText,CreationDate,CreatedByUserID,IntopicID,UserWasLogged,CreatedByUserName) VALUES('$comment',NOW(),null,'{$_SESSION["currenttopicid"]}','$userwaslogged','{$_SESSION["pseudo"]}')");
}

header('Location: topic.php');
?>
