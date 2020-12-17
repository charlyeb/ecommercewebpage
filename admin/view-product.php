<?php
if (isset($_COOKIE['Admin'])){
$title = "Admin Panel | View Product";
require_once "includes/header.php";
require_once "../php/all.php";
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $config->query("delete from products where id='$id'");
    header("location:view-product.php");
}elseif (isset($_GET['sts'])){
    $ids = $_GET['sts'];
    $select_s = $config->query("select * from products where id='$ids'");
    $array_s = mysqli_fetch_array($select_s);
    $sts = $array_s['status'];
    if ($sts==1){
        $config->query("update products set status='2' where id='$ids'");
        header("location:view-product.php");
    }else{
        $config->query("update products set status='1' where id='$ids'");
        header("location:view-product.php");
    }
}
?>
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <div class="card-body">
                        <div class="adv-table">
                            <?php if (isset($_SESSION['Alert'])){ ?><div class="alert alert-success"><?= $_SESSION['Alert'] ?></div> <?php unset($_SESSION['Alert']); } ?>
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Title</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $select = $config->query("select * from products order by id desc");
                                while ($arr = mysqli_fetch_array($select)){
                                ?>
                                <tr class="gradeX">
                                    <td>#<?= isset($arr['id'])?$arr['id']:'' ?></td>
                                    <td><?= isset($arr['title'])?$arr['title']:'' ?></td>
                                    <td><?= isset($arr['amount'])?$arr['amount']:'' ?></td>
                                    <td><input class="form-control w-25" type="number" id="quantity_change_<?= $arr['id'] ?>" data-pid="<?= $arr['id'] ?>" value="<?= isset($arr['quantity'])?$arr['quantity']:'' ?>"></td>

                                    <script>
                                        $("#quantity_change_<?= $arr['id'] ?>").on("change",function () {
                                            var quantity_id = $(this).data("pid");
                                            var value = $(this).val();
                                            var data= {
                                                "secured":"admi",
                                                "product_id":quantity_id,
                                                "quantity_val":value
                                            };
                                            $.ajax({
                                                url: "change_quantity.php",
                                                type: "post",
                                                data: data ,
                                                success: function (response) {
                                                    alert("Success")
                                                }
                                            });
                                        })
                                    </script>

                                    <td>
                                        <?php
                                        if ($arr['status']==1){
                                            ?><a href='?sts=<?= $arr["id"] ?>'><i class="fa fa-eye text-success"></i></a><?php
                                        }else{
                                            ?><a href='?sts=<?= $arr["id"] ?>'><i class="fa fa-eye-slash text-warning"></i></a><?php
                                        }
                                        ?>
                                    </td>
                                    <td><a href="?delete=<?= $arr['id'] ?>"><i class="fa fa-trash-o text-danger"></i></a></td>
                                </tr>
                                <?php
                                }
                                ?>
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
}
else{
    header("location:login.php");
}
    ?>
