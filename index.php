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
    <script src="js/index_cockie_check.js"></script>
    <div class="nav_bar">
        <a href="index.php"><img src="img/nav-bar/logo.png" alt="logo" class="logo"></a>

        <div class="burger_menu" onclick="checkbox_checked()">
            <input type="checkbox" id="checkbox-toggle">
            <label for="checkbox-toggle" class="bar"><span class="bar-line"></span></label>
        </div>

        <div class="main_link">
            <img src="Img/nav-bar/main.png" alt="Main" class="main_ico">
            <p>Store</p>
        </div>

        <a href="php/bag/bag.php" class="bag_link">
            <img src="img/nav-bar/bag_unactive.png" alt="bag" class="bag-ico">
            <p>Bag</p>
        </a>

        <div class="exit" onclick="exit()">
            <img src="Img/nav-bar/exit.png" alt="exit" class="exit_ico">
        </div>
    </div>


    <div class="main">
        <div class="search_wrapper">
            <form method="get" action="php/search.php" class="search">
                <label for="search_input">Search item</label><br>
                <input type="text" name="search" placeholder="Apple Watch, Samsung S21, Macbook Pro, ..." id="search_input">
            </form>
        </div>
    
        

            <?php
                require 'php/connect.php';
                if(!isset($_COOKIE['user'])){
                    header('Location: register/login.html');
                }
                if(!isset($_COOKIE['search'])){
                    $products = mysqli_query($conn, "SELECT `id`, `name`,`shortInfo`,`price`,`img`, `type` FROM `products`");
                }
                else{
                    $search = $_COOKIE["search"];
                    $products = mysqli_query($conn, "SELECT `id`, `name`,`shortInfo`,`price`,`img`, `type` FROM `products` WHERE `name` LIKE '%". $search ."%'  ");
                }
                if($products->num_rows != 0){
                    echo '<div class="products_wrapper">';
                    while($info = $products->fetch_assoc()){
                        echo 
                        '<div class="product_'.$info["type"].'">
                            <a href="php/productPage.php?id='. $info["id"].'" class="product_preview_'.$info["type"].'">
                                <img src="'.$info["img"].'" alt="product">
                            </a>
                            <div class="product_info">
                                ';
                                if(strlen($info['name']) > 14 && $info['type'] == 'small'){
                                    echo '<a href="php/productPage.php?id='.$info["id"].'" class="product_name" id="product_name_smallText">'.$info["name"].'</a>';
                                }
                                else {
                                    echo '<a href="php/productPage.php?id='.$info["id"].'" class="product_name">'.$info["name"].'</a>';
                                }
    
                                echo '<p class="product_details">
                                '.$info["shortInfo"].'
                                </p>
                            </div>
                            <div class="product_footer">
                                <div class="product_price">$ 
                                '.$info["price"].'
                                </div>
                                <a class="addToBag" href="php/addToBag.php?id='.$info["id"].'">
                                    <img src="Img/Products/addToBag.png" alt="add to bag">
                                </a>
                            </div>
                        </div>';
                    };
                }
                else{
                    echo '<div class="products_wrapper_error">
                        <p class="notFound">
                            No products with this name were found
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
                    <a class='bag_products_preview_".$bag_preview['type']."' href='php/dellFromBag.php?id=" . $bag_preview['id'] . "' onmouseover='bag_hover(this)'; onmouseout='bag_unhover(this)'>
                        <img src='".$bag_preview['img']."' alt='product'>
                    </a>";
                }
                $conn->close();
            ?>
            
            
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