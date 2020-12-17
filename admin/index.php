<?php
if (isset($_COOKIE['Admin'])){
    include "../php/all.php";
    session_abort();
    $title = "Admin Panel | Orders";
    require_once "includes/header.php";
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = $config->query("delete from orders where id='$id'");
        $_SESSION['alert'] = "Success";
        header("location:index.php");
    }
    ?>
    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-sm-12">
                    <?php if (isset($_SESSION['alert'])){ ?><div class="alert alert-warning">Success</div><?php unset($_SESSION['alert']);} ?>
                    <section class="card">
                        <div class="card-body">
                            <div class="adv-table">
                                <table class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Order ID</th>
                                        <th>Product ID</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Pay</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $select = $config->query("select * from orders");
                                    while ($array = mysqli_fetch_array($select)){
                                        ?>
                                        <tr class="gradeX">
                                            <td><?= $array['username'] ?></td>
                                            <td><?= $array['order_id'] ?></td>
                                            <td><?= $array['product_id'] ?></td>
                                            <td><?= $array['quantity'] ?></td>
                                            <td>$<?= $array['amount'] ?></td>
                                            <td><?= $array['payment']>0?'$'.$array['payment']:'<font color="red">Unpaid</font>' ?></td>
                                            <td><a href="?delete=<?= $array['id']?>"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>Order ID</th>
                                        <th>Product ID</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Pay</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
    <!--main content end-->
    <?php
    require_once "includes/footer.php";
}else{
    header("location");
}
?>
