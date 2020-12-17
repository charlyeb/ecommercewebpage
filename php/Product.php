<?php


namespace Product;


use Config\Config;

class Product
{
    public function add($data,$file)
    {
        $config = new Config();
        $title = $data['title'];
        $amount = $data['amount'];
        $details = $data['details'];
        $quantity = $data['quantity'];
        $idetails = htmlentities($details);
        $img_name_gen_a = time().rand(1000,99999);
        $img_name_gen_b = time().rand(10000,999999);
        $img_name_gen_c = time().rand(100000,9999999);
        $img_name_gen_d = time().rand(1000000,99999999);
        $img_name_gen_e = time().rand(10000000,999999999);
        $location = '../images/';
        if (empty($title) | empty($quantity) | empty($amount) | empty($details)){
            $_SESSION['Error']="All Field is Required";
            header("location:../admin/add-product.php");
        }else{
            $order_id_gen = rand(1001,99999);
            $select_i = $config->query("select * from products where order_id='$order_id_gen'");
            $num_rows = mysqli_num_rows($select_i);
            if ($num_rows>0){
                $_SESSION['Error']="Sorry Something Problem";
                header("location:../admin/add-product.php");
            }else {

                $img_a_explode = explode('.',$file['img_a']['name']);
                $img_a_type = end($img_a_explode);
                $img_a_name = $img_name_gen_a.'.'.$img_a_type;
                move_uploaded_file($file['img_a']['tmp_name'],$location.$img_a_name);
                if (!isset($file['img_b']['name'])==''){
                    $img_b_explode = explode('.',$file['img_b']['name']);
                    $img_b_type = end($img_b_explode);
                    if (!$img_b_type==''){
                        $img_b_name = $img_name_gen_b.'.'.$img_b_type;
                        $img_b_db_name = ' | '.$img_b_name;
                        move_uploaded_file($file['img_b']['tmp_name'],$location.$img_b_name);
                    }
                }elseif (!isset($file['img_c']['name'])==''){
                    $img_c_explode = explode('.',$file['img_c']['name']);
                    $img_c_type = end($img_c_explode);
                    $img_c_name = $img_name_gen_c.'.'.$img_c_type;
                    $img_c_db_name = ' | '.$img_c_name;
                    move_uploaded_file($file['img_c']['tmp_name'],$location.$img_c_name);
                }elseif (!isset($file['img_d']['name'])==''){
                    $img_d_explode = explode('.',$file['img_d']['name']);
                    $img_d_type = end($img_d_explode);
                    $img_d_name = $img_name_gen_d.'.'.$img_d_type;
                    $img_d_db_name = ' | '.$img_d_name;
                    move_uploaded_file($file['img_d']['tmp_name'],$location.$img_d_name);
                }elseif (!isset($file['img_e']['name'])==''){
                    $img_e_explode = explode('.',$file['img_e']['name']);
                    $img_e_type = end($img_e_explode);
                    $img_e_name = $img_name_gen_e.'.'.$img_e_type;
                    $img_e_db_name = ' | '.$img_e_name;
                    move_uploaded_file($file['img_e']['tmp_name'],$location.$img_e_name);
                }
                $order_id = $order_id_gen;
                $images = $img_a_name.$img_b_db_name.$img_c_db_name.$img_d_db_name.$img_e_db_name;
                $insert = $config->query("INSERT INTO `products`(`order_id`, `title`, `amount`, `images`, `quantity`, `details`) VALUES ('$order_id','$title','$amount','$images','$quantity',\"$idetails\")");
                if ($insert==true){
                    $_SESSION['Error']="Success";
                    header("location:../admin/add-product.php");
                }else{
                    $_SESSION['Error']="Error";
                    header("location:../admin/add-product.php");
                }
            }
        }
    }

    public function cart($data)
    {
        $product_id = $data['product_id'];
        $quantity = $data['quantity'];
        if (isset($_SESSION['Product'])){
            $item_array_id = array_column($_SESSION['Product'],'product_id');
            if (!in_array($data['product_id'],$item_array_id)) {
                $count = count($_SESSION['Product']);
                $item_array = [
                    "product_id" => $product_id,
                    "quantity" => $quantity
                ];
                $_SESSION['Product'][$count] = $item_array;
                header("location:../cart.php");
            }else{
                header("location:../cart.php?added");
            }
        }
        else {
            $array = [
                "product_id" => $product_id,
                "quantity" => $quantity
            ];
            $_SESSION['Product'][0] = $array;
            header("location:../cart.php");
        }
    }

    public function product_quantity($product,$quantity)
    {
        $config = new Config();
        $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$product'");
        $array_product = mysqli_fetch_array($select_prdocut);
        $old_quantity = $array_product['quantity'];
        $main_quantity = $old_quantity-$quantity;
        $config->query("UPDATE `products` SET quantity='$main_quantity' where id='$product'");
    }
}