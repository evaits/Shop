<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/bag.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Bag</title>

</head>
<body>
    <div class="nav_bar">
        <a href="../../index.php"><img src="../../img/nav-bar/logo.png" alt="logo" class="logo"></a>

        <div class="burger_menu" onclick="checkbox_checked()">
            <input type="checkbox" id="checkbox-toggle">
            <label for="checkbox-toggle" class="bar"><span class="bar-line"></span></label>
        </div>

        <a href="../../index.php" class="main_link">
            <img src="../../Img/nav-bar/main_unactive.png" alt="Main" class="main_ico">
            <p>Store</p>
        </a>

        <div class="bag_link">
            <img src="../../img/nav-bar/bag.png" alt="bag" class="bag-ico">
            <p>Bag</p>
        </div>

        <div class="exit" onclick="exit('../../')">
            <img src="../../Img/nav-bar/exit.png" alt="exit" class="exit_ico">
        </div>
    </div>


    <div class="main">
        <div class="wrapper">
            <h1 class="title">
                Check your Bag Items
            </h1>

            <?php 
                if(!isset($_COOKIE['user'])){
                    header('Location: ../../register/login.html');
                }
                require '../connect.php';
                $product = mysqli_query($conn, "SELECT 
                products.id AS 'productID', products.name, products.shortInfo , products.price, products.img, products.type, bag.id, SUBSTRING(products.midleInfo, 1, 150) AS 'midleInfo', bag.amount, bag.product_id  FROM `products` JOIN bag ON products.id=bag.product_id WHERE bag.user_id = ". $_COOKIE['user'] .";");
                if($product->num_rows != 0){
                    while($info = $product->fetch_assoc()){
                        echo 
                        '<div class="product">
                            <img src="'. $info["img"] .'" alt="product" class="product_img_'. $info["type"] .'">
                            <div class="text">
                                <a href="../productPage.php?id='.$info["productID"].'" class="product_name">'.$info["name"].'</a>
                                <p class="short_info">
                                    '. $info["shortInfo"] .'
                                </p>
                                <p class="middle_info">
                                    '. $info["midleInfo"] .'...
                                </p>
                                <div class="product_footer">
                                    <div class="price">
                                        $ '. $info["price"] .' x '. $info["amount"] .'
                                    </div>
                                    <div class="amount">
                                        <a href="reduceAmount.php?id='. $info["id"] .'" class="minus blocked">
                                            -
                                        </a>
                                        '. $info["amount"] .'
                                        <a href="../addToBag.php?id='. $info["product_id"] .'" class="plus">
                                            +
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
                else{
                    echo '
                        <h3 class="bagEmpty">
                            Bag is empty
                        </h3>
                        <p class="bagEmpty_p">
                            You can add products on the 
                            <a href="../../index.php">
                                main page.
                            </a>
                        </p>
                    ';
                }
            ?>     
            
        </div>
    </div>


    <div class="bag">
        <h2 class="bag_title">
            Bag
        </h2>
        <div class="bag_products">
            <?php
                $bag_products = mysqli_query($conn, 'SELECT bag.id, products.type, products.img FROM `bag` INNER JOIN products ON bag.product_id=products.id WHERE bag.user_id='.$_COOKIE["user"].'');

                while($bag_preview = $bag_products->fetch_assoc()){
                    echo "
                    <a class='bag_products_preview_".$bag_preview['type']."' href='../dellFromBag.php?id=" . $bag_preview['id'] . "' onmouseover='bag_hover(this)'; onmouseout='bag_unhover(this)'>
                        <img src='".$bag_preview['img']."' alt='product'>
                    </a>";
                }
                $conn->close();
            ?>
        </div>
        <a href="#!" class="linkToBag">
            <img src="../../Img/Products/bag_ico.png" alt="bag">
            View Bag
        </a>
    </div>

    <script src="../../js/index.js"></script>
    <script src="../../js/exit.js"></script>
</body>
</html>