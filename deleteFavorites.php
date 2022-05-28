<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header('Location: login.php');
    exit;
} 
$conn = mysqli_connect("localhost", "root","", "hw1") or die(mysqli_error($conn));
$_title = "'" .mysqli_real_escape_string($conn, $_GET["title"]) ."'";
$username = "'" .mysqli_real_escape_string($conn, $_SESSION['session_username']) ."'";
$query = "delete from preferiti where user=" .$username ."and title=" .$_title;
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
if(!$res){
    mysqli_close($conn);
    echo "errore di rimossione"; //debug
}
$query = " select * from preferiti where user=" ."'" .mysqli_real_escape_string($conn, $_SESSION['session_username']) ."'";
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
if(mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res))
    {
            $articoli[] = $row;
    }
    mysqli_free_result($res);
    mysqli_close($conn);
    echo json_encode($articoli);
}
else echo json_encode(null);


?>