<!DOCTYPE html>
<html>
    <head>
        <title>Log out</title>
        <style>
            body{background-image: url("imgs/istockphoto-1131858515-612x612.jpg");}
            h2{
                text-align: center;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            a{
                font-size: large;
                justify-content: center;
                justify-items: center;
                margin-left: 200px;
                

            }
            .logout {
                 border: 1px solid black;
                 width: 600px;
                 height: 300px;
                 margin: auto;
                 margin-top: 150px;
                 border-radius: 10px;
                 background-image: url("imgs/crumpleduppieceofpaper.jpg");
                }               
        </style>
    </head>
    <body>
        <div class="logout">
            <?php
                session_start();
                unset($_SESSION['loggedin']);
                session_destroy();
            ?>

            <h2>We're sad to see you go, visit us again soon for updates on new releases!</h2>
            <a href="login.php">Back to Login Page</a></br>
            <a href="register.php">Create a new account</a>
        </div>
    </body>
</html>