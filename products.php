<?php
include "php/all.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>All Products - Eagle Drones</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
<div class="container">
    <div class="navbar">
        <div class="logo">
            <img src="images/eagleDronesLogo.png" width="125px" />
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
        <img src="images/cart.png" width="30px"  onclick="window.location.href='cart.php'" height="30" />
        <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
    </div>
</div>
<div class="small-container">
    <div class="row row-2">
        <h2>All Products</h2>
        <select>
            <option>Default Sorting</option>
            <option>Sort by price</option>
            <option>Sort by popularity</option>
            <option>Sort by rating</option>
            <option>Sort by sale</option>
        </select>
    </div>

    <div class="row">
        <?php
        $select = $config->query("SELECT * FROM `products` order by id desc ");
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

    <div class="page-btn" style="text-align: center">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#10132;</span>
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
                    <img src="images/play-store.png" />
                    <img src="images/app-store.png" />
                </div>
            </div>
            <div class="footer-col-2">
                <img src="images/eagleDronesLogo.png" />
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
        <hr />
        <p class="copyright">Copyright 2020 - Eagle Drones</p>
    </div>
</div>

<!--- JS for toggle menu ------->
<script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";
    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }
</script>
<script src="script.js"></script>
</body>
</html>
