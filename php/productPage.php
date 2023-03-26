<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/productPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php
        require 'connect.php';
        $id = $_GET['id'];
        $product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = ". $id ."");
        $info = $product->fetch_assoc();
        echo "<title>".$info['name']."</title>";
    ?>
</head>
<body>
    <div class="nav_bar">
        <a href="../index.html"><img src="../img/nav-bar/logo.png" alt="logo" class="logo"></a>

        <div class="burger_menu" onclick="checkbox_checked()">
            <input type="checkbox" id="checkbox-toggle">
            <label for="checkbox-toggle" class="bar"><span class="bar-line"></span></label>
        </div>

        <div class="main_link">
            <img src="../Img/nav-bar/main.png" alt="Main" class="main_ico">
            <p>Store</p>
        </div>

        <a href="#!" class="bag_link">
            <img src="../img/nav-bar/bag.png" alt="bag" class="bag-ico">
            <p>Bag</p>
        </a>

        <div class="exit" onclick="exit()">
            <img src="../Img/nav-bar/exit.png" alt="exit" class="exit_ico">
        </div>
    </div>


    <div class="main">
        <div class="wrapper">
            <a class="back" href="../index.php">
                <img src="../Img/productPage/back.png" alt="arrow">
                Back
            </a>
            <div class="main_info">
                <?php 
                    echo '
                    <div class="pictures">
                        <div class="img_wrapper_small">
                            <img src="'.$info["img"].'" alt="product">
                        </div>
                        <div class="img_wrapper_small">
                            <img src="'.$info["img"].'" alt="product">
                        </div>
                        <div class="img_wrapper_small">
                            <img src="'.$info["img"].'" alt="product">
                        </div>
                    </div>
                    <div class="main_img_small">
                        <img src="'.$info["img"].'" alt="product">
                    </div>

                    <div class="info">
                        <div class="name">
                            '.$info["name"].'
                        </div>
                        <div class="short_info">
                            '.$info["shortInfo"].'
                        </div>
                        <div class="price">
                            $ '.$info["price"].'
                        </div>
                        <div class="midle_info">
                            '.$info['midleInfo'].'
                        </div>
                        <a class="btn_addToBag" href="addToBag.php?id='.$info['id'].'">
                            <img src="../Img/Products/bag_ico.png" alt="bag">
                            Add to Bag
                        </a>
                    </div>'
                
                    ;
                ?>
            </div>
            <div class="line"></div>
            <h3 class="description">
                Description
            </h3>
            <div class="text">
                <?php
                    echo $info['info'];
                ?>
            </div>
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
                    <a class='bag_products_preview_".$bag_preview['type']."' href='dellFromBag.php?id=" . $bag_preview['id'] . "' onmouseover='bag_hover(this)'; onmouseout='bag_unhover(this)'>
                        <img src='".$bag_preview['img']."' alt='product'>
                    </a>";
            }
            $conn->close();
        ?>
        </div>
        <a href="#!" class="linkToBag">
            <img src="../Img/Products/bag_ico.png" alt="bag">
            View Bag
        </a>
    </div>

    <script src="../js/index.js"></script>
    <script src="../js/exit.js"></script>
</body>
</html>