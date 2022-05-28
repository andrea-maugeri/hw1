<?php

session_start();
if(!isset($_SESSION['session_username'])){
    header('Location: login.php');
    exit;
} 

$conn = mysqli_connect("localhost", "root","", "hw1") or die(mysqli_error($conn));
$_title = "'" .mysqli_real_escape_string($conn, $_GET["title"]) ."'";
$username = "'" .mysqli_real_escape_string($conn, $_SESSION['session_username']) ."'";
$query = "select * from preferiti where user=" .$username ."and title=" .$_title;
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
if(mysqli_num_rows($res) > 0) 
    echo '1';
else echo '0';
mysqli_free_result($res);
mysqli_close($conn);
?>