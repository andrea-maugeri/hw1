<?php
session_start();
if(!isset($_SESSION['session_username'])){
    header('Location: login.php');
    exit;
} 


$conn = mysqli_connect("localhost", "root","", "hw1") or die(mysqli_error($conn));
$_title = "'" .mysqli_real_escape_string($conn, $_POST["title"]) ."',";
if(isset($_POST["img"]))
    $img = "'" .mysqli_real_escape_string($conn, $_POST["img"]) ."',";
else  $img =  "'" .mysqli_real_escape_string($conn, null) ."',";
$_article = "'" .mysqli_real_escape_string($conn, $_POST["article"]) ."',";
$_link = "'" .mysqli_real_escape_string($conn, $_POST["link"]) ."'";
$username = "'" .mysqli_real_escape_string($conn, $_SESSION['session_username']) ."',";
$query = " insert into preferiti values(" .$username .$_title .$img .$_article .$_link .")";
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($res){
    //mysqli_free_result($res);
    mysqli_close($conn);
    exit;
}
else {
    echo "errore";
    mysqli_close($conn);
    exit;
}


?>