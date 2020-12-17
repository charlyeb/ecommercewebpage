<?php


namespace Account;


use Config\Config;

class User
{
    public function register($request)
    {
        $config = new Config();
        $username = htmlentities($request['username']);
        $email = $request['email'];
        $password = $request['password'];
        $enc_password = sha1($password);
        if (strlen($username)>4){
            $select_user = $config->query("select * from users where username='$username'");
            $num_rows = mysqli_num_rows($select_user);
            if ($num_rows>0){
                $required = "Username not Available";
                $_SESSION['Error'] = $required;
                header("location:../account.php");
            }else{
                if (empty($request['username']) | empty($request['email']) | empty($request['password'])){
                    $required = "All Filed is Required";
                    $_SESSION['Error'] = $required;
                    header("location:../account.php");
                }else{
                    $insert = $config->query("INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username','$email','$enc_password')");
                    if ($insert==true){
                        $_SESSION['Success']="Registered Success";
                        header("location:../account.php");
                    }else{
                        $_SESSION['db']="Sorry Some Problem Exists";
                        header("location:../account.php");
                    }
                }
            }
        }else{
            $required = "Username need min 5 character";
            $_SESSION['Error'] = $required;
            header("location:../account.php");
        }
    }

    public function login($request)
    {
        $config = new Config();
        $username = $request['username'];
        $password = $request['password'];
        if (empty($username) | empty($password)){
            $_SESSION['Error']="All Field is Required";
            header("location:../account.php");
        }else{
            $en_pass = sha1($password);
            $select = $config->query("select * from userss where `username`like'$username'and`password`like'$en_pass'");
            $num_rows = mysqli_num_rows($select);
            if ($num_rows>0){
                $arr = mysqli_fetch_array($select);
                $dbusername = $arr['username'];
                $dnpassword = $arr['password'];
                if ($username==$dbusername){
                    if ($en_pass==$dnpassword){
                        $login_c = md5(sha1(time().'-'.$username.$password.rand(1000,99999)));
                        $update_c = $config->query("UPDATE `users` SET `login_c`='$login_c' where username='$username'");
                        $cookie = setcookie("User",$login_c,time()+(8600*2),'/');
                        if ($update_c && $cookie){
                            header("location:../account.php");
                        }else{
                            $_SESSION['Error']="Sorry Something Problem";
                            header("location:../account.php");
                        }
                    }else{
                        $_SESSION['Error']="Username and Password Wrong";
                        header("location:../account.php");
                    }
                }else{
                    $_SESSION['Error']="Username and Password Wrong";
                    header("location:../account.php");
                }
            }else{
                $_SESSION['Error']="Username and Password Wrong";
                header("location:../account.php");
            }
        }
    }

    public function logout()
    {
        setcookie("User",'',time()-3600,'/');
        header("location:../account.php");
    }
    public function logout_admin()
    {
        setcookie("Admin",'',time()-3600,'/');
        header("location:../admin/index.php");
    }
    public function login_admin($data)
    {
        $config = new Config();
        $username = $data['username'];
        $password = $data['password'];
        $select = $config->query("select * from admin where `username`like'$username'and`password`like'$password'");
        $num_rows = mysqli_num_rows($select);
        if ($num_rows>0){
            setcookie("Admin","$username",time()+(8600*2),"/");
            header("location:..//index.php");
        }else{
            header("location:../admin/login.php");
        }
    }
}
