<?php 
    session_start();
    include './Connect.php';

    $email = $_SESSION['eMail'];
    $sqlSelect = "SELECT * FROM userinformation WHERE eMail = '$email'";
    $result = mysqli_query($con, $sqlSelect);

    if($result){
        header("location:Dashboard.php");
    }else{
        header("LogIn.php");
    }
?>    