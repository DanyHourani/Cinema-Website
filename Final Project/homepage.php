<?php
session_start();
require "config.php";
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Welcome</title>
    <link rel="stylesheet" href="homestyle.css?parameter=1" type="text/css" />
    </head>
    <script>
        var indx=0;
        function bannerslide(ind){
            var i;
            var x=document.getElementsByClassName("pic");
            indx+=ind;
            if(indx<0)indx=x.length-1;
            else if(indx==x.length) indx=0;
            for(i=0;i<x.length;i++){
                x[i].style.visibility="hidden";
            }
            x[indx].style.visibility="visible";
        }
        function calculate(){
            var price;
            var total;
            var qutity=document.getElementById("tick").value;
            var select = document.getElementById('waytowatch');
			var option = select.options[select.selectedIndex];

            
            if(option.value=='1')
                price=10;
            
            else if(option.value=='2')
                price=15;
            
            else if (option.value=='3')
                price=20;
            
            total=qutity*price;
            document.getElementById("prc").value=total + ".00$";

        }
    </script>
    <body>
        <div class="wrapper">
            <header>
                 <div id="head">
                      <h1>Hello <?php echo $_SESSION['username']; ?>, Welcome to our cinema site</h1>
                 </div>

                 <nav>
                    <ul>
                        <li><a href="homepage.php">Home</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="movies.php">Now Showing</a></li>
                        <li><a href="comingsoon.php">Coming Soon</a></li>
                    </ul>
                </nav>
            </header>

            <div id="banner">
                <img src="imgs/spiderman.jpg" class="pic" alt="banner 1" />
                <img src="imgs/matrix.jpg" class="pic" alt="banner 2"/>
                <img src="imgs/encanto.jpg" class="pic" alt="banner 3"/>
                <img src="imgs/eternals.jpg" class="pic" alt="banner 4"/>
                <img src="imgs/batman.jpg" class="pic" alt="banner 5"/>
                <img src="imgs/dune.jpg" class="pic" alt="banner 6"/>
                <div id="bottom" >
                    <input type="button" value="<" name="btn1" onclick="bannerslide(-1)" >
                    <input type="button" value=">" name="btn2" id="btn2" onclick="bannerslide(1)">
                </div>
            </div>
            
            <section>
                <div id="sometext">
                    <h2>About us</h2>
                    <p>One of the leading cinemas in the Middle East! Watch every new movie in the best experience possible at our cinemas. Through our
                        website and mobile app, register to have an account and be able to choose the movie you want to see and the showtime you want.
                        Avoid waiting in line at the ticketing, and book your tickets online!
                    </p>
                </div>
                <div id="imax">
                    <img src="imgs/cinema.jpg"/>
                </div>
                <div id="dx">
                    <img src="imgs/Banner-3_1580985895.png">
                </div>
                <form>
                <div id="selection">
                    <h3>Select a movie</h3>
                    
                    <select name="movie">
                    <?php
                         $sql="select * from movies where movie_date < current_date()";
                         $stmt=$pdo->prepare($sql);
                    ?>
                    <optgroup label="Showing Now">
                        <?php
                           if($stmt->execute()){
                           while ($row=$stmt->fetch()) {
                           echo
                          
                           "<option>{$row['movie_name']}</option>"
                         ;}}?>
                        
                    </optgroup>

                    <?php
                        $sql="select * from movies where movie_date > current_date()";
                        $stmt=$pdo->prepare($sql);
                    ?>
                        <optgroup label="Coming Soon">
                        <?php
                           if($stmt->execute()){
                           while ($row=$stmt->fetch()) {
                           echo
                          
                           "<option>{$row['movie_name']}</option>"

                         ;}}?>
                        </optgroup>
                    </select>

                    <h3>Select a way to watch</h3>
                    <select id="waytowatch" onchange="calculate()">
                        <option id="1" name="exp" value="1" >Standard (10$)</option>
                        <option id="2" name="exp" value="2" >IMAX (15$)</option>
                        <option id="3" name="exp" value="3" >4DX (20$)</option>
                    </select>
                </div>
                <div id="qtity">
                    <h3>Select a date</h3>
                    <input id="date" type="date" name="dt"/>
                    <h3>Select tickets</h3>
                    <input id="tick" type="number" name="tickets" placeholder="Tickets" onblur="calculate()"/>
                </div>
                <div id="receipt">
                <h3>Price</h3>
                <input type="text" name="price" id="prc" disabled="true"/>
                <input type="submit" id="confirm" value="Confirm"/></br>
                <input type="checkbox" id="check"/> I agree to <a href="#" target="_blank" id="terms">terms and conditions</a>
                </div>
                
                
                </form>
                
            </section>
            
            <div id="posters">
                <h3>Now Showing</h3>
                <h4>Click on film for more info</h4>
                <div class="column">
                    <a href="https://www.youtube.com/watch?v=JfVOs4VSpmA&t=1s&ab_channel=SonyPicturesEntertainment"
                     target="_blank"><img src="imgs/spidermanposter.jpg"/></a>
                </div>
                <div class="column">
                    <a href="https://www.youtube.com/watch?v=8g18jFHCLXk&ab_channel=WarnerBros.Pictures"
                     target="_blank"><img src="imgs/duneposter.jpg"/></a>
                </div>
                <div class="column">
                    <a href="https://www.youtube.com/watch?v=9ix7TUGVYIo&ab_channel=WarnerBros.Pictures"
                     target="_blank"><img src="imgs/matrixposter.jpg"/></a>
                </div>
                <div class="column">
                    <a href="https://www.youtube.com/watch?v=x_me3xsvDgk&ab_channel=MarvelEntertainment"
                     target="_blank"><img src="imgs/eternalsposter.jpg"/></a>
                </div>
            </div>
            <div id="socials">
                <h3>For updates on our latest releases, follow us on our socials!</h3>
                <div class="media">
                <a href="https://www.instagram.com" target="_blank"><img src="imgs/Instagram_icon.png.jpg"/></a>
                 </div>
                <div class="media">
                <a href="https://www.facebook.com" target="_blank"><img src="imgs/Facebook_icon_2013.svg.png"/></a>
                 </div>
                <div class="media">
                <a href="https://www.twitter.com" target="_blank"><img src="imgs/free-twitter-logo-icon-2429-thumb.png"/></a>
                 </div>
            </div>

            <p><a href="logout.php" id="logout">Sign Out</a></p>
        </div>
    </body>
</html>
