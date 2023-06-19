<?php
session_start();
$sectionid = $_POST["deletesection"];
$db_connection = mysqli_connect("localhost","root","","3ch_db");
$query = mysqli_query($db_connection,"SELECT * FROM Topic WHERE InSectionID = '$sectionid'");
while ($topic = mysqli_fetch_array($query)){
    $query2 = mysqli_query($db_connection,"DELETE FROM Commentary WHERE IntopicID ='{$topic["TopicID"]}'");
    $query3 = mysqli_query($db_connection, "DELETE FROM Topic WHERE TopicID = '{$topic["TopicID"]}'");
}
$query4 = mysqli_query($db_connection,"DELETE FROM Section WHERE SectionID='$sectionid'");
header('Location: index.php');
?>
