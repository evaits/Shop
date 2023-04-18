<?php

    $id = $_GET['id'];
    require 'connect.php';
    
    $conn -> query("DELETE FROM `bag` WHERE `id` = ". $id ."");
    $conn->close();
    header('Location:' . $_SERVER['HTTP_REFERER']);