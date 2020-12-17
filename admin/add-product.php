<?php
if (isset($_COOKIE['Admin'])){
$title = "Admin Panel | Add Product";
require_once "includes/header.php";
?>
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-body">
                        <div class="<?= isset($_SESSION['Error'])?'alert alert-warning':'' ?>"><?= isset($_SESSION['Error'])?$_SESSION['Error']:'' ?><?php unset($_SESSION['Error']); ?></div>
                        <form action="../php/all.php" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
                            <div class="form-group has-success row">
                                <label class="col-lg-2 control-label">Title</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" class="form-control" placeholder="Title" value="" required>
                                </div>
                            </div>
                            <div class="form-group has-error row">
                                <label class="col-lg-2 control-label">Amount</label>
                                <div class="col-lg-10">
                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group has-error row">
                                <label class="col-lg-2 control-label">Quantity</label>
                                <div class="col-lg-10">
                                    <input type="number" name="quantity" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group has-error row">
                                <label class="col-lg-2 control-label">Details</label>
                                <div class="col-lg-10">
                                    <textarea name="details" class="form-control" required id="" cols="30" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <label class="col-lg-2 control-label">Image 01</label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" name="img_a" required>
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <label class="col-lg-2 control-label">Image 02 <small><i>(optional)</i></small>  </label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" name="img_b">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <label class="col-lg-2 control-label">Image 03 <small><i>(optional)</i></small> </label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" name="img_c">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <label class="col-lg-2 control-label">Image 04 <small><i>(optional)</i></small>
                                </label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" name="img_d">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <label class="col-lg-2 control-label">Image 05 <small><i>(optional)</i></small> </label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" name="img_e">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-danger" name="add_product" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
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
