<?php 
    $nickname = $_POST['nick'];
    $password = $_POST['password'];

    require 'connect.php';

    // Hash password
    $password = md5($password);

    // Check user
    $result = $conn->query("SELECT * FROM `users` WHERE `nickname` = '$nickname' AND `pass` = '$password'");

    $user = $result->fetch_assoc();

    if(count((array)$user) < 2) {
        setcookie('error', '1', time() + 2, "/");
        header('Location: ../register/login.html');
        exit();
    }

    setcookie('user', $user['id'], time() + 3600, "/");
    header('Location: ../index.php');
    $conn->close();