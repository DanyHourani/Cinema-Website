<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="homestyle.css?parameter=1" type="text/css" />
    </head>
    
    <body>
    <div class="wrapper">
    <h1>Movies Now Showing</h1>
    <nav>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="movies.php">Now Showing</a></li>
            <li><a href="comingsoon.php">Coming Soon</a></li>
        </ul>
    </nav>        
     <?php
     require "config.php";
    $sql="select * from movies where movie_date < current_date()";
    $stmt=$pdo->prepare($sql);
    ?>

    <div class="movielist">
    <table>
        
        <tr>
            <th>movie name</th>
            <th>release date</th>

        </tr>
        
        
        <?php
            if($stmt->execute()){
            while ($row=$stmt->fetch()) {
                echo
            "<tr>
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