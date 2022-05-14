(This was a university final project for a Web Development class, not all pages are complete)

This is a Cinema website that allows users to:
-Register
-Login
-See movies catalogue
-Buy tickets

All the movies listed are linked from the database (except the displayed pictures).

In the Homepage, the movies are listed in the dropdown box in the "Select a movie" area.
They are taken directly from the myphpadmin 'movies' table and is showing all the 'movie_name'.
They are split into 2 categories "Now Showing" and "Coming Soon" using an SQL query that includes 'current_date'.
Anytime a movie is added or deleted, the options in the select box will automatically be updated.

In the Homepage, the user can select a movie, and then select a way to watch and the number of tickets they want.
Each way of watching has a different price and the price will be calculated according to what the user picks through the 'Calculate()' function.
The Homepage also displays a banner for some movies at the top, the user is able to SLIDE through them as there are several banners using the function 'bannerslide'.
The movie posters displayed below also include an href link to the movie's trailer for more info for the user.

The Now Showing page displays the movies showing up until the current date.
The Coming Soon page displays the movies that will be showing soon after the current date.

Users are not able to add or delete movies since it is the cinema website's admin responsibility to do so.
That's why the 'admin.php' is not accessible from the website for the users to use, it has to be manually accessed.
The Admin page allows you to either add a movie to the database or delete a movie.
To add a film, enter Movie Title and its Release Date and press 'Add Movie'.
To delete a film, enter the movie's ID displayed below and press 'Delete Movie'.
All movies showing now and soon are displayed below.
