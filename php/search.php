<?php
    $product = $_GET['search'];
    setcookie('search', $product, time() + 2, "/");
    header('Location:' . $_SERVER['HTTP_REFERER']);
    