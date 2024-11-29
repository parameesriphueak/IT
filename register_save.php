<?php
    session_start();


if(isset($_POST['username'])){

    if(empty($_POST['password'])  != empty($_POST['com-password'])){
        $_SESSION['error'] = "รหัสผ่านไม่เท่าตรงกัน";
        header("location:register.php");
        die();
    }

    // if(empty($_POST['password']  8 ) ||  empty($_POST['password'] < 16)){
    //     $_SESSION['error'] = "รหัสผ่านต้องมีความยาว 8 - 16 ตัว";
    //     header("location:register.php");
    //     die();
    // }

    // $sql = "SELECT * FROM user where username='{$_POST['username']}' ";
    // $rows = exec($sql);
    // if(!empty($rows)){
    //     $_SESSION['error'] = "อีเมลซ้ำกับผู้ใช้อื่น";
    //     header("location:register.php");
    // }

    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $conn = new PDO("mysql:host=localhost;dbname=it;charset=utf8","root","");

    // $sql = "SELECT * FROM user where login='$login' ";

        $sql1 = "INSERT INTO users (firstname , lastname , username , password )
                VALUES ('$firstname','$lastname','$username','$password')";
        $conn->exec($sql1);
    
    $conn=null;
    header('location:login.php');
    die();
}else{
    header('location:index.php');
    die();
}

?>