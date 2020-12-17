<?php
if (isset($_COOKIE['Admin'])){
    header("location:index.php");
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin panel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />


</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="../php/all.php" method="post">
        <h2 class="form-signin-heading">Sign in Admin Panel</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="User Name" name="username" required autofocus>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <button class="btn btn-lg btn-login btn-block" name="login_adminp" type="submit">Sign in</button>

        </div>
    </form>

</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
}
