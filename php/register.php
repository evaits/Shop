<?php
    $nickname = $_POST['nick'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    require ("connect.php");

    $stmt = $conn->prepare("SELECT `nickname` FROM `users` WHERE `nickname` = ?");
    $stmt->bind_param("s", $nickname);
    $stmt->execute();

    $result = $stmt->get_result();
    $check = $result->fetch_assoc();

    if(isset($check)){
        setcookie('error', '1', time() + 2, "/");
        header('Location: ../register/register.html');  
    }
    else {
        $stmt = $conn->prepare("INSERT INTO users(nickname,email, pass) values(?,?,?)");
        $result = $stmt->bind_param("sss", $nickname,$email, $password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header('Location: ../register/login.html');  
    }

   
    
    