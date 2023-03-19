<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Shop</title>
</head>
<body>
    <div class="nav_bar">
        <a href="index.html"><img src="img/nav-bar/logo.png" alt="logo" class="logo"></a>

        <div class="burger_menu" onclick="checkbox_checked()">
            <input type="checkbox" id="checkbox-toggle">
            <label for="checkbox-toggle" class="bar"><span class="bar-line"></span></label>
        </div>

        <div class="main_link">
            <img src="Img/nav-bar/main.png" alt="Main" class="main_ico">
            <p>Store</p>
        </div>

        <a href="#!" class="bag_link">
            <img src="img/nav-bar/bag.png" alt="bag" class="bag-ico">
            <p>Bag</p>
        </a>

        <div class="exit" onclick="exit()">
            <img src="Img/nav-bar/exit.png" alt="exit" class="exit_ico">
        </div>
    </div>


    <div class="main">
        <div class="search_wrapper">
            <div class="search">
                <label for="search_input">Search item</label><br>
                <input type="text" name="search" placeholder="Apple Watch, Samsung S21, Macbook Pro, ..." id="search_input">
            </div>
        </div>
    
        
        <div class="products_wrapper">

            <?php
                require 'php/connect.php';
                $products = mysqli_query($conn, "SELECT `name`,`shortInfo`,`price`,`img`, `type` FROM `products` ORDER BY RAND()");
                
                while($info = $products->fetch_assoc()){
                    echo 
                    '<div class="product_'.$info["type"].'">
                        <div class="product_preview_'.$info["type"].'">
                            <img src="'.$info["img"].'" alt="product">
                        </div>
                        <div class="product_info">
                            ';
                            if(strlen($info['name']) > 14 && $info['type'] == 'small'){
                                echo '<p class="product_name" id="product_name_smallText">'.$info["name"].'</p>';
                            }
                            else {
                                echo '<p class="product_name">'.$info["name"].'</p>';
                            }

                            echo '<p class="product_details">
                            '.$info["shortInfo"].'
                            </p>
                        </div>
                        <div class="product_footer">
                            <div class="product_price">$ 
                            '.$info["price"].'
                            </div>
                            <div class="addToBag">
                                <img src="Img/Products/addToBag.png" alt="add to bag">
                            </div>
                        </div>
                    </div>';
                };
                
            ?>
            
        </div>
    </div>


    <div class="bag">
        <h2 class="bag_title">
            Bag
        </h2>
        <div class="bag_products">
            <div class="bag_products_preview">
                <img src="https://i.postimg.cc/Fzf8Kzt9/apple-watch.png" alt="product">
            </div>
            <div class="bag_products_preview">
                <img src="https://i.postimg.cc/Fzf8Kzt9/apple-watch.png" alt="product">
            </div>
            <div class="bag_products_preview">
                <img src="https://i.postimg.cc/Fzf8Kzt9/apple-watch.png" alt="product">
            </div>
            <div class="bag_products_preview">
                <img src="https://i.postimg.cc/Fzf8Kzt9/apple-watch.png" alt="product">
            </div>
            <div class="bag_products_preview">
                <img src="https://i.postimg.cc/Fzf8Kzt9/apple-watch.png" alt="product">
            </div>
            <div class="bag_products_preview">
                <img src="https://i.postimg.cc/Fzf8Kzt9/apple-watch.png" alt="product">
            </div>
        </div>
        <a href="#!" class="linkToBag">
            <img src="Img/Products/bag_ico.png" alt="bag">
            View Bag
        </a>
    </div>

    <script src="js/index.js"></script>
    <script src="js/exit.js"></script>
</body>
</html>