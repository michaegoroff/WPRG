<?php
session_start();
$userid = $_POST["deleteuser"];
$db_connection = mysqli_connect("localhost","root","","3ch_db");
$query = mysqli_query($db_connection,"SELECT * FROM Topic WHERE CreatedByUserID = '$userid'");
while($topic = mysqli_fetch_array($query)){
    $query2 = mysqli_query($db_connection,"DELETE FROM Commentary WHERE IntopicID ='{$topic["TopicID"]}'");
    $query3 = mysqli_query($db_connection,"DELETE FROM Topic WHERE TopicID = '{$topic["TopicID"]}'");
}
$query4 = mysqli_query($db_connection,"DELETE FROM User WHERE UserID='$userid'");
header('Location: index.php');

?>
