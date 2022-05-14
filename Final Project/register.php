<?php
require "config.php";
$username="";
$username_err="";
$password=$password_err=$confirm_password_err="";
if(isset($_GET["username"])){
    if(empty(trim($_GET["username"]))){
        $username_err="Please enter a username";
    }
    else{
        $username=$_GET["username"];
        $sql="select id from users where username=?";
        if($stmt=$pdo->prepare($sql)){
            $stmt->bindParam(1,$username);
            if($stmt->execute()){
                $row=$stmt->fetch();
                if($stmt->rowCount()==1){
                    $username_err="Username already exists!";
                }
                else{
                    $password=$_GET["password"];
                    if(empty(trim($_GET["password"]))){
                        $password_err="Please enter a password";
                    }
                    $confirm_password=$_GET["confirm_password"];
                    if(empty(trim($confirm_password))){
                        $confirm_password_err="Please confirm your password";
                    }
                    else{
                        if($password!=$confirm_password){
                            $confirm_password_err="Incorrect Passwords";
                        }
                        else{
                            $sql="insert into users(username, password) values(?,?)";
                            if($stmt=$pdo->prepare($sql)){
                                $pass=password_hash($password,PASSWORD_DEFAULT);
                                $stmt->bindParam(1,$username);
                                $stmt->bindParam(2,$pass);
                                if($stmt->execute()) header("location:login.php");
                                else echo "Error in insert execution!";

                            }
                            else echo "Error in insert prepare!";
                        }
                    }
                }
            }
            else{
                echo "Error in execution!";
            }
        }
        else{
            echo "Error in prepare!";
        }
    }
    unset($pdo);
}
?>

<!DOCTYPE html>
<html>
    <head><title>Register</title></head>
    <link rel="stylesheet" href="sitestyle.css?parameter=1" type="text/css" />
    <body>
        <div class="wrapper">
            <h2>Register</h2>
            <form action="" method="get">
                <label>Username</label>
                <input type="text" name="username" class="form_control" value="" />
                <span class="help_block"><?php echo $username_err; ?></span>
                <label>Password</label>
                <input type="password" name="password" class="form_control" value="" />
                <span class="help_block"><?php echo $password_err ;?></span>
                <label class="conf_pass">Confirm Password</label>
                <input type="password" name="confirm_password" class="form_control" value="" />
                <span class="help_block"><?php echo $confirm_password_err;?></span>
                <input type="submit" class="btn_submit" value="Submit" name="submit" />
                <input type="reset" class="btn_reset" value="Reset" name="reset" />


                <p id="regist">Fill your account info here. </br>
                    Already have an account? <a href="login.php">Login here</a></p>
            </form>
        </div>
    </body>
</html>