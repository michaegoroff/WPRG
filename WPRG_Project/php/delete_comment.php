<?php
session_start();
$commentid = $_POST["deletecomment"];
$db_connection = mysqli_connect("localhost","root","","3ch_db");
$query = mysqli_query($db_connection,"DELETE FROM Commentary WHERE CommentID ='$commentid'");
header('Location: topic.php');
?>
