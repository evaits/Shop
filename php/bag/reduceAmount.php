<?php

    $id = $_GET['id'];
    require '../connect.php';

    $amount = mysqli_query($conn, "SELECT amount FROM `bag` WHERE id= ". $id ."");
    $amount = $amount->fetch_assoc();
    if($amount["amount"] == 1){
        header('Location: ../dellFromBag.php?id='. $id .'');
    }
    else {
        $conn -> query("UPDATE `bag` SET `amount`= amount-1 WHERE `id` = ". $id ."");
        $conn->close();
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
    
    