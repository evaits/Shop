<?php
    $nickname = $_POST['nick'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    require ("connect.php");
    $stmt = $conn->prepare("INSERT INTO users(nickname,email, pass) values(?,?,?)");
    $result = $stmt->bind_param("sss", $nickname,$email, $password);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    header('Location: ../register/login.html');