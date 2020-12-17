<?php
include "php/all.php";
if (isset($_POST['secured']) && isset($_POST['order_id']) && isset($_POST['payment'])){
    if ($_POST['secured']=='admin1'){
        $orderid_pay = $_POST['order_id'];
        $payment = $_POST['payment'];
        $update = $config->query("UPDATE `orders` SET `payment`='$payment' WHERE order_id='$orderid_pay'");
        $select = $config->query("select * from orders where order_id='$orderid_pay'");
        $array_order = mysqli_fetch_array($select);
        $product_id = explode("|",$array_order['product_id']);
        $product_quantity = explode("|",$array_order['quantity']);
        $product->product_quantity($product_id[0],$product_quantity[0]);
        if (!isset($product_id[1])){
            echo "paid12123";
            exit();
        }
        $product->product_quantity($product_id[1],$product_quantity[1]);
        if (!isset($product_id[2])){
            echo "paid12123";
            exit();
        }
        $product->product_quantity($product_id[2],$product_quantity[2]);
        if (!isset($product_id[3])){
            echo "paid12123";
            exit();
        }
        $product->product_quantity($product_id[3],$product_quantity[3]);
        if (!isset($product_id[4])){
            echo "paid12123";
            exit();
        }
        $product->product_quantity($product_id[4],$product_quantity[4]);
        if (!isset($product_id[5])){
            echo "paid12123";
            exit();
        }
        $product->product_quantity($product_id[5],$product_quantity[5]);
        if (!isset($product_id[6])){
            echo "paid12123";
            exit();
        }
        $product->product_quantity($product_id[6],$product_quantity[6]);
        if (!isset($product_id[7])){
            echo "paid12123";
            exit();
        }
        $product->product_quantity($product_id[7],$product_quantity[7]);
        if (!isset($product_id[8])){
            echo "paid12123";
            exit();
        }
        $product->product_quantity($product_id[8],$product_quantity[8]);
        if (!isset($product_id[9])){
            echo "paid12123";
            exit();
        }
        $product->product_quantity($product_id[9],$product_quantity[9]);
    }else{
        echo "Secrete Key Error";
    }
}else{
    echo "Error";
}
