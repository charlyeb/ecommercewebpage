<?php
session_start();
require_once "Config.php";
require_once "Product.php";
require_once "User.php";
require_once "Amount.php";
use Config\Config;
use Product\Product;
use User\Amount;
new \Account\User;
$config = new Config();
$product = new Product();
$user = new \Account\User();
$amount = new Amount();
if (isset($_POST['register'])){
    $request = $_POST;
    $user->register($request);
}elseif (isset($_POST['login_user'])){
    $request_login = $_POST;
    $user->login($request_login);
}elseif (isset($_GET['logout'])){
    $user->logout();
}elseif (isset($_POST['add_product'])){
    $request_product = $_POST;
    $product->add($request_product,$_FILES);
}elseif (isset($_POST['add_to_cart'])){
    $request_cart = $_POST;
    $product->cart($request_cart);
}elseif (isset($_GET['logout_admin'])){
    $user->logout_admin();
}elseif (isset($_POST['login_adminp'])){
    $user->login_admin($_POST);
}