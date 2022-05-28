<?php
    session_start();
    if(isset($_SESSION['session_username'])){
        header('Location: home.php');
        exit;
    }
    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["name"]) && !empty($_POST["surname"]))
    {
        $conn = mysqli_connect("localhost", "root","", "hw1") or die(mysqli_error($conn));
        $user = mysqli_real_escape_string($conn, $_POST["username"]);
        $stringa_query = "select * from login where username = '$user'";
        $res = mysqli_query($conn, $stringa_query) or die(mysqli_error($conn));
        if (mysqli_num_rows($res) > 0){
            echo '2';
            mysqli_close($conn);
            exit;
        }
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        if (!preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{8,16}$/", $_POST['password'])) {
            echo '2';
            mysqli_close($conn);
            exit;
        } 
        $password = mysqli_real_escape_string($conn, password_hash($_POST['password'],PASSWORD_BCRYPT));
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);
        $query = "insert into login values('$username','$password','$name','$surname') ";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($res){
            $_SESSION["session_username"] = $_POST['username'] ;
            mysqli_close($conn);
            exit;
        }
        else {
            mysqli_close($conn);
            exit;
        }
    }
    else{
        echo '1';
        exit;
    }
?>