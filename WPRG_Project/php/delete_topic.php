<?php
session_start();
$topicid = $_POST["deletetopic"];
$db_connection = mysqli_connect("localhost","root","","3ch_db");
$query = mysqli_query($db_connection,"DELETE FROM Commentary WHERE InTopicID='$topicid'");
$query2 = mysqli_query($db_connection,"DELETE FROM Topic WHERE TopicID='$topicid'");
header('Location: index.php');
?>
