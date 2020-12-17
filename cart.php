<?php
include "php/all.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Products Details - Eagle Drones</title>
    <script src="jquery.js"></script>
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
        <img src="images/cart.png" width="30px" height="30"  onclick="window.location.href='cart.php'" />
        <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
    </div>
</div>
<?php
if(isset($_GET['remove_item'])){
    $item = $_GET['remove_item'];
    foreach ($_SESSION['Product'] as $keys=>$values){
        if ($values['product_id']==$item){
            unset($_SESSION['Product'][$keys]);
            echo "<script>alert('Item Remove Success');window.location.href='cart.php'</script>";
        }
    }
}elseif (isset($_GET['payment_success'])){
    unset($_SESSION['orderID']);
    ?>
    <div class="small-container cart-page">
        <div class="" style="margin-bottom: 2rem; text-align: center;color: green">Thanks for Pay <a
                    href="products.php">Click here to home</a></div>
    </div>

<?php
    exit();
}elseif (isset($_GET['cancel'])){
    unset($_SESSION['orderID']);
    header("location:products.php");
}elseif (isset($_POST['total_amount']) && isset($_POST['ship']) or isset($_POST['paynow'])){
     if (isset($_COOKIE['User'])){
        $request = $_POST;
        $ck = $_COOKIE['User'];
        $select_u = $config->query("SELECT * FROM `users` WHERE login_c='$ck'");
        $array_u = mysqli_fetch_array($select_u);
        $username = $array_u['username'];
        $product_id = implode("|",$request['product_id']);
        $color = implode("|",$request['color']);
        $ship = $request['ship'];
        $quantity = implode("|",$request['quantity']);
        $order_id = rand(1001,999999);
        if (isset($request['product_id'][0]) && isset($request['quantity'][0])){
            $amounta = $amount->amount_gen_a($request['product_id'][0],$request['quantity'][0]);

        }
        if (isset($request['product_id'][1]) && isset($request['quantity'][1])){
            $amount1 = $amount->amount_gen_a($request['product_id'][1],$request['quantity'][1]);
            $amountb = $amounta+$amount1;

        }
        if (isset($request['product_id'][2]) && isset($request['quantity'][2])){
            $amount2 = $amount->amount_gen_a($request['product_id'][2],$request['quantity'][2]);
            $amountc = $amountb+$amount1;
        }
        if (isset($request['product_id'][3]) && isset($request['quantity'][3])){
            $amount3 = $amount->amount_gen_a($request['product_id'][3],$request['quantity'][3]);
            $amountd = $amountc+$amount1;
        }
        if (isset($request['product_id'][4]) && isset($request['quantity'][4])){
            $amount4 = $amount->amount_gen_a($request['product_id'][4],$request['quantity'][4]);
            $amounte = $amountd+$amount1;
        }
        if (isset($request['product_id'][5]) && isset($request['quantity'][5])){
            $amount5 = $amount->amount_gen_a($request['product_id'][5],$request['quantity'][5]);
            $amountf = $amounte+$amount1;
        }
        if (isset($request['product_id'][6]) && isset($request['quantity'][6])){
            $amount6 = $amount->amount_gen_a($request['product_id'][6],$request['quantity'][6]);
            $amountg = $amountf+$amount1;
        }
        if (isset($request['product_id'][7]) && isset($request['quantity'][7])){
            $amount7 = $amount->amount_gen_a($request['product_id'][7],$request['quantity'][7]);
            $amounth = $amountg+$amount1;
        }
        if (isset($request['product_id'][8]) && isset($request['quantity'][8])){
            $amount8 = $amount->amount_gen_a($request['product_id'][8],$request['quantity'][8]);
            $amounti = $amounth+$amount1;
        }
        if (isset($request['product_id'][9]) && isset($request['quantity'][9])){
            $amount9 = $amount->amount_gen_a($request['product_id'][9],$request['quantity'][9]);
            $amountj = $amounti+$amount1;
        }
        $totalamntv = $amount->amount_gen($amounta);
        if (isset($amountj)){
            $totalamntv = $amount->amount_gen($amountj);
        }elseif (isset($amounti)){
            $totalamntv = $amount->amount_gen($amounti);
        }elseif (isset($amounth)){
            $totalamntv = $amount->amount_gen($amounth);
        }elseif (isset($amountg)){
            $totalamntv = $amount->amount_gen($amountg);
        }elseif (isset($amountf)){
            $totalamntv = $amount->amount_gen($amountf);
        }elseif (isset($amounte)){
            $totalamntv = $amount->amount_gen($amounte);
        }elseif (isset($amountd)){
            $totalamntv = $amount->amount_gen($amountd);
        }elseif (isset($amountc)){
            $totalamntv = $amount->amount_gen($amountc);
        }elseif (isset($amountb)){
            $totalamntv = $amount->amount_gen($amountb);
        }
        unset($_SESSION['orderID']);
        $config->query("INSERT INTO `orders`(`order_id`, `product_id`, `username`, `quantity`, `amount`, `payment`, `ship`, `status`) VALUES ('$order_id','$product_id','$username','$quantity','$totalamntv','0','$ship','1')");
        unset($_SESSION['Product']);
        $_SESSION['orderID']=$order_id;
        header("location:cart.php");
    }else{
         header("location:account.php");
     }
}
?>
<!--- cart item details -------->
<form action="" method="post" class="small-container cart-page">
    <?php if (isset($_GET['added'])){ ?><div class="" style="margin-bottom: 2rem; text-align: center;color: green">Product Already added
        <a href="cart.php">Back to Cart</a> or <a href="products.php">Product</a></div><?php exit(); } ?>
    <?php
    if (!empty($_SESSION['Product'])){
        ?>
        <table class="htable">
        <tr>
            <th class="hth">Product</th>
            <th class="hth">Quantity</th>
            <th class="hth">Subtotal</th>
            <th class="hth">Action</th>
        </tr>
        <?php
            $total_rows = 1;
            foreach ($_SESSION['Product'] as $cart=>$values){
                $idp = $values['product_id'];
                $select = $config->query("select * from products where id='$idp'");
                $array = mysqli_fetch_array($select);
                ?>
                <tr>
                    <input type="hidden" name="product_id[]" id="product_main_<?= $idp ?>" value="<?= $idp ?>">
                    <input type="hidden" name="color[]" value="<?= $color ?>">
                    <td class="htd">
                        <div class="cart-info">
                            <img src="images/<?php $xplode = explode("|",$array['images']); echo $xplode[0]; ?>" />
                            <div>
                                <p><?= $array['title'] ?></p>
                                <small>Price: $<span><?= $array['amount'] ?></span>.00</small>
                                <br />
                                <!--                                <a href="">Remove</a>-->
                            </div>
                        </div>
                    </td>
                    <td class="htd"><input name="quantity[]" type="number" <?= isset($_POST['total_amount'])?'disabled':''  ?> min="1" class="quantity_p_<?= $total_rows ?>" id="quantity_change_<?= $idp ?>" value="<?= $values['quantity'] ?>" max="<?= $array['quantity'] ?>" /></td>
                    <td class="htd">$<span class="amount_gen" id="amount_<?= $idp ?>"><?= $array['amount']*$values['quantity'] ?></span></td>
                    <td class="htd"><a href="?remove_item=<?= $array['id'] ?>">Remove</a></td>
                </tr>
                <script>
                    $("#quantity_change_<?= $idp ?>").on("click",function () {
                        var quantity = $("#quantity_change_<?= $idp ?>").val();
                        var amount = <?= $array['amount'] ?>;
                        var sub_amt = amount * quantity;
                        $("#amount_<?= $idp ?>").text(sub_amt);
                    })
                </script>
            <?php
                $total_rows++;
            }
            ?>
        </table>
        <div class="shiping">
            <input type="text" name="ship" style="height: 3rem" required placeholder="Shipping Address">
        </div>
        <div class="" style="text-align: right"><button type="submit" name="total_amount" style="width: 16rem" class="btn">Pay Now</button></div>
        <?php
    }elseif (isset($_SESSION['orderID'])){
        $orderid_pay = $_SESSION['orderID'];
        $select_for_p = $config->query("select * from orders where order_id='$orderid_pay'");
        $array_for_p  = mysqli_fetch_array($select_for_p);
        $product_id = explode("|",$array_for_p['product_id']);
        $product_quantity = explode("|",$array_for_p['quantity']);
        if (isset($product_id[9]) && isset($product_quantity[9])){
            $prodcut_nine = $product_id[9];
            $quantity_ord_nine = $product_quantity[9];
            $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$prodcut_nine'");
            $array_product = mysqli_fetch_array($select_prdocut);
            $old_quantity = $array_product['quantity'];
            if($old_quantity==0){
                echo "<div style='text-align: center'>Your Product not available :(</div>";
                unset($_SESSION['orderID']);
                exit();
            }
        }elseif (isset($product_id[8]) && isset($product_quantity[8])){
            $prodcut_eight = $product_id[8];
            $quantity_ord_eight = $product_quantity[8];
            $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$prodcut_eight'");
            $array_product = mysqli_fetch_array($select_prdocut);
            $old_quantity = $array_product['quantity'];
            if($old_quantity==0){
                echo "<div style='text-align: center'>Your Product not available :(</div>";
                unset($_SESSION['orderID']);
                exit();
            }
        }elseif (isset($product_id[7]) && isset($product_quantity[7])){
            $prodcut_seven = $product_id[7];
            $quantity_ord_seven = $product_quantity[7];
            $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$prodcut_seven'");
            $array_product = mysqli_fetch_array($select_prdocut);
            $old_quantity = $array_product['quantity'];
            if($old_quantity==0){
                echo "<div style='text-align: center'>Your Product not available :(</div>";
                unset($_SESSION['orderID']);
                exit();
            }
        }elseif (isset($product_id[6]) && isset($product_quantity[6])){
            $prodcut_six = $product_id[6];
            $quantity_ord_six = $product_quantity[6];
            $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$prodcut_six'");
            $array_product = mysqli_fetch_array($select_prdocut);
            $old_quantity = $array_product['quantity'];
            if($old_quantity==0){
                echo "<div style='text-align: center'>Your Product not available :(</div>";
                unset($_SESSION['orderID']);
                exit();
            }
        }elseif (isset($product_id[5]) && isset($product_quantity[5])){
            $prodcut_five = $product_id[5];
            $quantity_ord_five = $product_quantity[5];
            $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$prodcut_five'");
            $array_product = mysqli_fetch_array($select_prdocut);
            $old_quantity = $array_product['quantity'];
            if($old_quantity==0){
                echo "<div style='text-align: center'>Your Product not available :(</div>";
                unset($_SESSION['orderID']);
                exit();
            }
        }elseif (isset($product_id[4]) && isset($product_quantity[4])){
            $prodcut_four = $product_id[4];
            $quantity_ord_four = $product_quantity[4];
            $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$prodcut_four'");
            $array_product = mysqli_fetch_array($select_prdocut);
            $old_quantity = $array_product['quantity'];
            if($old_quantity==0){
                echo "<div style='text-align: center'>Your Product not available :(</div>";
                unset($_SESSION['orderID']);
                exit();
            }
        }elseif (isset($product_id[3]) && isset($product_quantity[3])){
            $prodcut_tree = $product_id[3];
            $quantity_ord_tree = $product_quantity[3];
            $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$prodcut_tree'");
            $array_product = mysqli_fetch_array($select_prdocut);
            $old_quantity = $array_product['quantity'];
            if($old_quantity==0){
                echo "<div style='text-align: center'>Your Product not available :(</div>";
                unset($_SESSION['orderID']);
                exit();
            }
        }elseif (isset($product_id[2]) && isset($product_quantity[2])){
            $prodcut_two = $product_id[2];
            $quantity_ord_two = $product_quantity[2];
            $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$prodcut_two'");
            $array_product = mysqli_fetch_array($select_prdocut);
            $old_quantity = $array_product['quantity'];
            if($old_quantity==0){
                echo "<div style='text-align: center'>Your Product not available :(</div>";
                unset($_SESSION['orderID']);
                exit();
            }
        }elseif (isset($product_id[1]) && isset($product_quantity[1])){
            $prodcut_one = $product_id[1];
            $quantity_ord_one = $product_quantity[1];
            $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$prodcut_one'");
            $array_product = mysqli_fetch_array($select_prdocut);
            $old_quantity = $array_product['quantity'];
            if($old_quantity==0){
                echo "<div style='text-align: center'>Your Product not available :(</div>";
                unset($_SESSION['orderID']);
                exit();
            }
        }else{
            $prodcut_a = $product_id[0];
            $quantity_a = $product_quantity[0];
            $select_prdocut = $config->query("SELECT * FROM `products` WHERE id='$prodcut_a'");
            $array_product = mysqli_fetch_array($select_prdocut);
            $old_quantity = $array_product['quantity'];
            if($old_quantity==0){
                echo "<div style='text-align: center'>Your Product not available :(</div>";
                unset($_SESSION['orderID']);
                exit();
            }
        }
        ?>
        <div class="small-container cart-page">
            <table class="htable">
                <tr>
                    <th class="hth">Order ID</th>
                    <th class="hth">Tax</th>
                    <th class="hth">Amount</th>
                </tr>
                <tr>
                    <td class="htd"><?php echo $array_for_p['order_id'] ?></td>
                    <td class="htd">$8.25%</td>
                    <td class="htd">$<?php echo $array_for_p['amount'] ?></td>
                </tr>
            </table>
            <div class="" style="text-align: right;margin-top: 2rem;display:flex;">
                <div class="" style="width: 100%;">
                    <script src="https://www.paypal.com/sdk/js?client-id=AbVdzT14Zlp6JS-x2IGRnxv7reRGLrcoK8tMohrbm5jzwYs6PbIPh3-71Ga7Mi_8s9IzwkiDMbBhFzja"></script>
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '<?= $array_for_p['amount'] ?>'
                                        }
                                    }]
                                });
                            },
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    var name = details.payer.name.given_name;
                                    var reseponse= {
                                        "secured":"admin12123",
                                        "order_id":<?= $orderid_pay ?>,
                                        "payment":<?= $array_for_p['amount'] ?>
                                    };
                                    $.ajax({
                                        url: "payment_recived.php",
                                        type: "post",
                                        data: reseponse ,
                                        success: function (response) {
                                            if (response=='paid12123'){
                                                window.location.href='?payment_success';
                                                // console.log(response)
                                            }else{
                                                console.log(response)
                                            }
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            console.log(textStatus, errorThrown);
                                        }
                                    });
                                });
                            }
                        }).render('#paypal-button-container'); // Display payment options on your web page
                    </script>
                </div>
            </div>
            <div class="">
                <div class="" style="text-align: center;width: 20%;margin-right: auto;"><a href="?cancel" style="width: 16rem" class="btn">Cancel</a></div>
            </div>
        </div>
        <?php
        if (!isset($_GET['payment_success'])){
            ?>
        <script type="text/javascript">
            window.onbeforeunload = function() {
                return "Are you sure"
            }
        </script>
            <?php
        }
    }else{
        ?>
        <div class="" style="margin-bottom: 2rem; text-align: center;">Empty Cart go to <a href="products.php">Prodtuct</a></div>
        <?php
}
?>
</form>
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
<script src="script.js"></script>
</body>
</html>
