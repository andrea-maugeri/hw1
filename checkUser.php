<?php 
if(isset($_GET["user"])){
    $conn = mysqli_connect("localhost", "root","", "hw1") or die(mysqli_error($conn));
    $user = mysqli_real_escape_string($conn, $_GET["user"]);
    $stringa_query = "select * from login where username = '$user'";
    $res = mysqli_query($conn, $stringa_query) or die(mysqli_error($conn));
    if (mysqli_num_rows($res) > 0){
        echo '1';
        mysqli_close($conn);
        exit;
    }
}
?>