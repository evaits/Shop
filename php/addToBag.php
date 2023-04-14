<?php
    require 'connect.php';
    $id = $_GET['id'];

    $products = mysqli_query($conn, "SELECT * FROM `bag` WHERE `user_id` = ". $_COOKIE['user'] ." AND `product_id` = ". $id .";");

    $products = $products->fetch_assoc();
    if(!isset($products)) {
        $stmt = mysqli_query($conn, "INSERT INTO bag(user_id, product_id, amount) VALUES (". $_COOKIE['user'] .", ". $id .", '1')");
    }
    else {
        $amount = $products['amount'] + 1;
        $stmt = mysqli_query($conn, "UPDATE `bag` SET `amount`= ". $amount ." WHERE `id` = ". $products['id'] ." ");
    }
    
    $conn->close();
    header('Location:' . $_SERVER['HTTP_REFERER']);