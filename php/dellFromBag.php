<?php

    $product_id = $_GET['id'];
    require 'connect.php';
    
    $conn -> query("DELETE FROM `bag` WHERE `id` = $product_id");
    $conn->close();
    header('Location:' . $_SERVER['HTTP_REFERER']);