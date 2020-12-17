<?php
include "php/all.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= isset($_COOKIE['User'])?'Account':'User Login & Registration' ?></title>
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
        <img src="images/cart.png" width="30px" height="30" onclick="window.location.href='cart.php'" />
        <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
    </div>
</div>

<!--- Account Page ------------------------------------------------------------>
<div class="<?= isset($_COOKIE['User'])?'':'account' ?>-page">
    <div class="container">
        <?php
        if (isset($_COOKIE['User'])){
            ?>
            <div style="margin-bottom: 5rem;" class="row">
                <div class="col-md-12" style="width: 100%">
                    <h2 class="text-center" style="text-align: center;margin-bottom: 2rem;">All Orders</h2>
                    <table class="table mt-3" style="width: 100%">
                        <thead>
                        <tr>
                            <th style="text-align: left" scope="col">ID</th>
                            <th style="text-align: left" scope="col">Product</th>
                            <th style="text-align: left" scope="col">Amount</th>
                            <th style="text-align: left" scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody style="line-height: 3">
                        <?php
                        $ck = $_COOKIE['User'];
                        $select_u = $config->query("SELECT * FROM `users` WHERE login_c='$ck'");
                        $array_u = mysqli_fetch_array($select_u);
                        $username = $array_u['username'];
                        $con = $config->query("select * from orders where username='$username'");
                        while ($array = mysqli_fetch_array($con)){
                        ?>
                        <tr style="">
                            <td style="text-align: left">#<?= $array['order_id'] ?></td>
                            <td>
                                <?php
                                $explode = explode('|',$array['product_id']);
                                echo count($explode);
                                ?>
                            </td>
                            <td>$<?= $array['amount'] ?></td>
                            <td><?= $array['status']==1?'Active':'Inactive' ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }else{
            ?>
            <div class="row">
                <div class="col-2">
                    <img src="images/category-1.png" width="100%" />
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator" />
                        </div>
                        <div class=""><small class="" style="color: red"><?php if(isset($_SESSION['Error'])){ echo $_SESSION['Error']; unset($_SESSION['Error']); } ?></small></div>
                        <div class=""><small class="" style="color: green"><?php if(isset($_SESSION['Success'])){ echo $_SESSION['Success']; unset($_SESSION['Success']); } ?></small></div>
                        <div class=""><small class="" style="color: green"><?php if(isset($_SESSION['db'])){ echo $_SESSION['db']; unset($_SESSION['db']); } ?></small></div>
                        <form id="LoginForm" method="post" action="php/all.php">
                            <input type="text" name="username" placeholder="Username" />
                            <input type="password" name="password" placeholder="Password" />
                            <button type="submit" name="login_user" class="btn">Login</button>
                            <a href="">Forgot password</a>
                        </form>
                        <form id="RegForm" action="php/all.php" method="post">
                            <input type="text" name="username" placeholder="Username" />
                            <input type="email" name="email" placeholder="Email" />
                            <input type="password" name="password" placeholder="Password" />
                            <button type="submit" name="register" class="btn">Register</button>
                        </form>
                    </div>
                </div>
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
<!--- JS for toggle Form ------->
<script type="text/javascript">
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");
    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
    }
    function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(  0px)";
    }
</script>
<script src="script.js"></script>
</body>
</html>