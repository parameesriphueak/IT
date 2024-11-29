<?php
    session_start();
    
    // if(isset($_SESSION['id'])){
    //     header("location:login.php");
    //     die();
    // }


    $username = $_POST['username'];
    $password =  $_POST['password'];
    

    $conn = new PDO("mysql:host=localhost;dbname=it;charset=utf8","root","");


    $sql = "SELECT * FROM users where username='$username' and password = '$password' ";
    $result = $conn->query($sql);

    if($result->rowCount() == 1){
        $data = $result->fetch(PDO::FETCH_ASSOC);
        header("location:insert.php");
        die();
    }else{
        $_SESSION['error'] = "error";
        header("location:login.php");
        die();
    }
    $conn = null;
?>