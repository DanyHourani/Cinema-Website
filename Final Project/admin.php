<?php
 require "config.php";
$movie_name="";
$movie_name_err="";
$movie_date="";
$movie_date_err="";
$result="";

if(isset($_GET["movie_name"])){
    if(empty(trim($_GET["movie_name"]))){
        $movie_name_err="Please enter a movie title";
    }
    else{
        $movie_name=$_GET["movie_name"];
        $sql="select movie_id from movies where movie_name=?";
        if($stmt=$pdo->prepare($sql)){
            $stmt->bindParam(1,$movie_name);
            if($stmt->execute()){
                $row=$stmt->fetch();
                if($stmt->rowCount()==1){
                    $movie_name_err="Movie already exists!";
                }
                else{
                    $movie_date=$_GET["movie_date"];
                    if(empty(trim($_GET["movie_date"]))){
                        $movie_date_err="Please enter a release date";
                    }
                    else{
                        $sql="insert into movies(movie_name, movie_date) values(?,?)";
                        if($stmt=$pdo->prepare($sql)){
                            $stmt->bindParam(1,$movie_name);
                            $stmt->bindParam(2,$movie_date);
                            if($stmt->execute()) $result="Movie added successfully";
                            else echo "Error in insert execution!";

                        }
                        else echo "Error in insert prepare!";
                    }
                }
            }
        }
    }
}
?>
<?php
$movie_id="";
$movie_id_err="";
$deleteresult="";

if(isset($_GET["movie_id"])){
    if(empty(trim($_GET["movie_id"]))){
        $movie_id_err="Please enter a movie ID";
    }
    else{
        $movie_id=$_GET["movie_id"];
        $sql="delete from movies where movie_id=?";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(1,$movie_id);
        if ($stmt->execute()) {
            $deleteresult="movie ID '$movie_id' was deleted successfully";
        }
    }
}



?>


<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="homestyle.css?parameter=1" type="text/css" />
    <style>
        .movielist{
            margin-top:50px;
            position: absolute;
            top: 150px;
            right: 100px;
            border: 1px solid white;
        }
        .wrapper{
            height: 1000px;
        }
        
        .form_control {
            height: 20px;
            border-radius: 4px;
            margin: ;
            width: 20%;
            display: block;
        }
        input {
            text-align: center;
        }
        label {
            margin: auto;
            display: block;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
            font-size: 85%;
        }
        .help_block {
            height: 35px;
            display: block;
            font-weight: bold;
            text-shadow: 1px 1px 2px black;
        }
    </style>
    </head>
    
    <body>
    <div class="wrapper">
    <h1>Update Movies</h1>
    <nav>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="movies.php">Now Showing</a></li>
            <li><a href="comingsoon.php">Coming Soon</a></li>
        </ul>
    </nav>        
    <h3>You can either add movies or delete them</h3>
    <h4>To add a film, enter the film's title and release date</h4>
    <h4>To remove a film from the site, enter it's ID displayed below</h4>
    <div class="addfilm">
     <form action="" method="get">
    
        <label>Movie Title</label>
        <input type="text" name="movie_name" class="form_control" value="" />
        <span class="help_block"><?php echo $movie_name_err; ?></span>
        <label>Release Date</label>
        <input type="text" name="movie_date" class="form_control" value="" />
        <span class="help_block"><?php echo $movie_date_err;?></span>
        <input type="submit" class="btn_submit" value="Add Movie" name="submit" />
        <span class="help_block"><?php echo $result;?></span>
    </div>

     </form>
     <form action="" method="get">
         <label>Movie ID</label>
         <input type="text" name="movie_id" class="form_control" value="" />
         <span class="help_block"><?php echo $movie_id_err; ?></span>
         <input type="submit" class="btn_submit" value="Delete Movie" name="submit" />
         <span class="help_block"><?php echo $deleteresult;?></span>
    </form>
    

    <div class="movielist">
    <?php
    
    $sql="select * from movies";
    $stmt=$pdo->prepare($sql);
    ?>
    <table>
        
        <tr>
            <th>movie ID</th>
            <th>movie name</th>
            <th>release date</th>

        </tr>
        
        
        <?php
            if($stmt->execute()){
            while ($row=$stmt->fetch()) {
                echo
            "<tr>
          <td>{$row['movie_id']}</td>
          <td>{$row['movie_name']}</td>
          <td>{$row['movie_date']}</td>
            </tr>";
            }}
        ?>
        
    </table>
    </div>
    
    </div>
    
    </body>
    
</html>