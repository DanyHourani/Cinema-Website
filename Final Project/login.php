<?php
require "config.php";
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    header("location:homepage.php");
    exit;
}
$username="";
$password_err="";
$username_err="";
if(isset($_GET['submit'])){
    $username=$_GET['username'];
    if(empty(trim($username))){
        $username_err="Please enter a username";
    }
    $password=$_GET['password'];
    if(empty(trim($password))){
        $password_err="Please enter a password";
    }
    if(empty($username_err) && empty($password_err)){
        $sql="select * from users where username=?";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(1,$username);
        if($stmt->execute()){
            $row=$stmt->fetch();
            if($stmt->rowCount()==1){
                if(password_verify($password,$row[2])){
                    $_SESSION['loggedin']=true;
                    $_SESSION['username']=$username;
                    header("location:homepage.php");
                }
                else{
                    $password_err="Password Incorrect!";
                }
            }
            else{
                $password_err="Account not found, please register";
            }
        }

    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <style>
           
        </style>
        <link rel="stylesheet" href="sitestyle.css?parameter=1" type="text/css" />
    </head>
    <body>
        <div class="wrapper">
            <h2>Login</h2>
            <form action="" method="get">
                
                <input type="text" name="username" placeholder="Username" class="form_control" value=""/>
                <span class="help_block"><?php echo $username_err; ?></span>
                <input type="password" name="password" placeholder="Password" class="form_control" value="" />
                <span class="help_block"><?php echo $password_err ;?></span>
                <input type="submit" class="btn_login" value="Login" name="submit" />

            </form>
            <form action="register.php" class="logintext">
                <input type="submit" class="btn_register" value="Register" name="register"/>
                <p id="login_p">Please enter your account info to login.</br>
                If you don't have an account, click register.</p>
            </form>

        </div>
    </body>
</html>