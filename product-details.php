<?php
include "php/all.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $select = $config->query("select * from products where id='$id'");
    $num = mysqli_num_rows($select);
    if ($num>0){
        $array = mysqli_fetch_array($select);
        if ($array['quantity']==0){
            header("location:products.php");
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <title>Products Details - Eagle Drones</title>
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
                <img src="images/cart.png" width="30px" height="30" onclick="window.location.href='cart.php'"  />
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
            </div>
        </div>

        <!--- Single Product Details -------->
        <div class="small-container single-product">
            <div class="row">
                <div class="col-2">
                    <img src="images/<?php $xplode = explode('|',$array['images']); echo $xplode[0] ?>" width="100%" style="height: 17rem" id="ProductImg" />
                    <div class="small-img-row">
                        <?php
                        foreach ($xplode as $img){
                            ?>
                            <div class="small-img-col">
                                <img src="images/<?= str_replace(" ",'',$img) ?>" width="75%" style="height: 3.7rem" class="small-img" />
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <form action="php/all.php" method="post" class="col-2">
                    <p>Home / FPV Drone</p>
                    <h1><?= $array['title'] ?></h1>
                    <h4>$<?= $array['amount'] ?>.00</h4>
                    <input type="hidden" name="product_id" value="<?= $array['id'] ?>">
                    <input name="quantity" min="1" type="number" value="1" max="<?= $array['quantity'] ?>" />
                    <button style="border: none;cursor:pointer;width: 8rem" type="submit" name="add_to_cart" class="btn">Add to Cart</button>
                    <h3>Product Details <i class="fa fa-indent"></i></h3>

                    <p><?= $array['details'] ?></p>
                </form>
            </div>
        </div>
        <!--- title ------------------------------------------------------------>
        <div class="small-container">
            <div class="row row-2">
                <h2>Related Products</h2>
                <p>View More</p>
            </div>
        </div>

        <!--- products ------------------------------------------------------------>
        <div class="small-container">
            <div class="row">
                <?php
                $select3 = $config->query("SELECT * FROM `products` order by id asc limit 3");
                while ($arr = mysqli_fetch_array($select3)){
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
                ?>
            </div>
        </div>
        <!--- footer ------------------------------------------------------------>
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
        <script type="text/javascript">
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
        <!--- JS for product gallery ------->
        <script type="text/javascript">
            var ProductImg = document.getElementById(ProductImg);
            var SmallImg = document.getElementsByClassName("small-img");

            SmallImg[0].onclick = function () {
                ProductImg.src = SmallImg[0].src;
            };
            SmallImg[1].onclick = function () {
                ProductImg.src = SmallImg[1].src;
            };
            SmallImg[2].onclick = function () {
                ProductImg.src = SmallImg[2].src;
            };
            SmallImg[3].onclick = function () {
                ProductImg.src = SmallImg[3].src;
            };
        </script>
        <script src="script.js"></script>
        </body>
        </html>
<?php
    }else{
        echo "NULL2";
    }
}else{
    echo "NULL";
}