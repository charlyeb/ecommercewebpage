<?php
include "php/all.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eagle Drones | Have your eyes in the sky</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/eagleDronesLogo.png" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Product</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="account.php">Account</a></li>
                    <?php if (isset($_COOKIE['User'])){ echo '<li><a href="logout.php">Logout</a></li>'; }?>
                </ul>
            </nav>
            <a href="cart.php"><img src="images/cart.png" width="30px" height="30"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
        <div class="row">
            <div class="col-2">
                <h1>Eagle<br>Drones</h1>
                <p>Have your eyes in the sky.<br>Explore where your body can't reach.</p>
                <a href="" class="btn">Explore Now &#10132;</a>
            </div>
            <div class="col-2">
                <img src="images/image2.png">
            </div>
        </div>
    </div>
</div>
<!--- Featured Categoties ------------------------------------------------->
<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="images/category-1.png">
            </div>
            <div class="col-3">
                <img src="images/category-2.png">
            </div>
            <div class="col-3">
                <img src="images/category-1.png">
            </div>
        </div>
    </div>
</div>
<!--- Featured Products ------------------------------------------------->
<div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
        <?php
        $select = $config->query("SELECT * FROM `products` limit 3");
        while ($arr = mysqli_fetch_array($select)){
        if ($arr['status']==1){
            if ($arr['quantity']>0){
        ?>
        <div class="col-4">
            <a href="product-details.php?id=<?= $arr['id'] ?>"><img src="images/<?php $img_01 = explode('|',$arr['images']); echo $img_01[0]; ?>" /></a>
            <a href="product-details.php?id=<?= $arr['id'] ?>"><h4><?= $arr['title'] ?></h4></a>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <p>$<?= $arr['amount'] ?>.00</p>
        </div>
            <?php
            }
        }
        }
        ?>
    </div>
    <!--- Latest Products ------->
    <div class="row">
        <?php
        $select2 = $config->query("SELECT * FROM `products` order by id desc limit 3");
        while ($arr2 = mysqli_fetch_array($select2)){
            if ($arr2['status']==1){
            if ($arr2['quantity']>0){
            ?>
            <div class="col-4">
                <a href="product-details.php?id=<?= $arr2['id'] ?>"><img src="images/<?php $img_main = explode('|',$arr2['images']); echo $img_main[0]; ?>" /></a>
                <a href="product-details.php?id=<?= $arr2['id'] ?>"><h4><?= $arr2['title'] ?></h4></a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>$<?= $arr2['amount'] ?>.00</p>
            </div>
            <?php
            }
            }
        }
        ?>
    </div>
</div>

<!--- Offer ------->
<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="images/product-4.png" class="offer-img">
            </div>
            <div class="col-2">
                <p>Exclusively Available on Eagle Drones</p>
                <h1>FPV Bundle</h1
                <small> This package is all in one ready to use <br>
                    so you can start flying into the sky.<br></small>
                <a href="products.php" class="btn">Buy Now &#10132;</a>
            </div>
        </div>
    </div>
</div>

<!--- Testimonial ------->
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa fa-quote-lef"></i>
                <p>Rating for this drone is excelent, I wish everyone could have one</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <img src="images/user-1.png">
                <h3>Carlos Espinosa</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-lef"></i>
                <p>Rating for this drone is excelent, I wish everyone could have one</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <img src="images/user-1.png">
                <h3>John Abraham</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-lef"></i>
                <p>Rating for this drone is excelent, I wish everyone could have one</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <img src="images/user-1.png">
                <h3>John Smith</h3>
            </div>
        </div>
    </div>
</div>

<!--- brands ------->
<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <img src="images/eagleDronesLogo.png">
            </div>
            <div class="col-5">
                <img src="images/eagleDronesLogo.png">
            </div>
            <div class="col-5">
                <img src="images/eagleDronesLogo.png">
            </div>
            <div class="col-5">
                <img src="images/eagleDronesLogo.png">
            </div>
        </div>
    </div>
</div>

<!--- footer ------->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download Our App</h3>
                <p>Download our App for iOS and Android</p>
                <div class="app-logo">
                    <img src="images/play-store.png">
                    <img src="images/app-store.png">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="images/eagleDronesLogo.png">
                <p>Our purpose is to get your eyes in the sky and place you into a higher place</p>
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliates</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow Us</h3>
                <ul>
                    <li>Instagram</li>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>YouTube</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright 2020 - Eagle Drones</p>
    </div>
</div>

<!--- JS for toggle menu ------->
<script>
    var MenuItems = document.getElementById('MenuItems');
    MenuItems.style.maxHeight = "0px";
    function menutoggle(){
        if(MenuItems.style.maxHeight == "0px")
        {
            MenuItems.style.maxHeight = "200px";
        }
        else
        {
            MenuItems.style.maxHeight="0px";
        }
    }
</script>
<script src="script.js"></script>

</body>

</html>
