<?php
    require 'connect.php';
    $id = $_GET['id'];
    $stmt = $conn->prepare("INSERT INTO bag(user_id, product_id) values(?,?)");
    $result = $stmt->bind_param("ii", $_COOKIE['user'], $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: ../index.php');