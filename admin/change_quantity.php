<?php
include "../php/all.php";
if (isset($_POST['secured'])){
    if ($_POST['secured']=="ad"){
        $product_id = $_POST['product_id'];
        $quantity_val = $_POST['quantity_val'];
        $update = $config->query("UPDATE `products` SET `quantity`='$quantity_val' WHERE id='$product_id'");
        if ($update==true){
            echo "Success";
        }else{
            echo "Error";
        }
    }
}
