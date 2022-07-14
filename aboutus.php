<?php

include 'db.php';
include 'config.php';

session_start();

if(!isset($_SESSION["user_id"])) {
    header('Location: ' . URL . 'login.php');
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assistant Manager</title>
    <script src="aboutus.js"></script>
    <link rel="stylesheet" href="css/style.css">  
    <link rel="icon" href="favicon.ico">              
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

  </head>
  <body>
    
  <header>
            <a href="index.php" class="header-elements logo"></a>
            <input type="text" class ="header-elements search" placeholder=" Search..">
            <button class ="header-elements arrow"><img src="images/arrow.png"></button>
            <button class ="header-elements coach"><img src="images/coach.png"></button>
            <button class ="header-elements chat"><img src="images/chat.png"></button>
            <button class ="header-elements allert"><img src="images/allert.png"></button>
            <button id="hamburger"><img src="images/hamburger.png"></button>
        </header>

            <section id="left-side">                
                <nav class="menu">
                    <ul>
                        <li id="record_training"><img src="images/record_training.png"><a href="#"class="menu_button"><p>Record Training</p></a></li>
                        <li><img src="images/squad.png"><a href="squad.php"class="menu_button"><p>Squad</p></a></li>
                        <li><img src="images/next_match.png"><a href="#"class="menu_button"><p>Next Match</p></a></li>
                        <li><img src="images/transfare_window_goals.png"><a href="#"class="menu_button"><p>Transfare Window Goals</p></a></li>
                        <li><img src="images/players_task_list.png"><a href="#"class="menu_button"><p>Players Task List</p></a></li>
                        <li><img src="images/add_player.png"><a href="addPlayer.php"class="menu_button"><p>Add Player</p></a></li>
                        <li id="settings"><img src="images/settings.png"><a href="#"class="menu_button"><p>Settings</p></a></li>
                        <li><a href="#" class="menu_button"><img src="images/about_us.png"><p>About Us</p></a></li>
                        <li><a href="logout.php" class="menu_button"><img src="images/enter.png"><p>Log Out</p></a></li>
                    </ul>
                </nav>
                <img src="images/barcelona.png" id="symbol">
            </section>

        <main>
            <section id="breadcrumps">
                <span><a href="index.php">Home Page</a> > <a href="aboutus.php">About Us</a></span>
            </section>

            <section id="content" style="overflow:auto">

            <h1>About us</h1>
    <p><br>
        We are Benjamin Lellouche and Ilai Azulay and we are software engineering students at shenkar, as soccer fans we chose to develop this application.  
    </p><br>
    <p><br>
        <h3>About Assistant Manager:</h3>
        The Assistant Manager system adapts an optimal training program for the staff
        players personally according to their weak and strong points and selects the most
        suitable squad with the highest chances of winning each game .</p><br>
        <p><br>
        A football team coach needs to see what is happening and analyze the performance
        of more than 11 players at the same time during training, which is not optimal, and
        also the analysis can sometimes be wrong because it depends on the coach’s ability
        to pay attention to small details.
        In addition, a coach need to choose from a selection of more than 20 staff players
        with which players to go up for each game, and each game is different in terms of
        the rival players and the formation of the opposite team, which makes it difficult for
        the coach to decide which eleven players will get the best result.
    </p><br>
    <p>
        <div class="main_goals">The main goals are:</div>
        <ol><br>
            <li>
                Give the coach data on the players performance and stats
            </li>
            <li>
                Setting goals to each player.
            </li>
            <li>
                Monitor the players progress and tasks.
            </li>
            <li>
                Give the players option to monitor their progress.
            </li>
        </ol>
    </p>
    <p>Here are the customers who use our services:</p><br>

    <table>
        <thead>
            <tr id="data_title">
                <th>CLUB</th>
                <th>TRAINER</th>
                <th>TROPHY</th>
                <th class="comment">COACH WORDS</th>
            </tr>
        </thead>
        <tbody id="data-output" >

        </tbody>
    </table>
    

                </div>
            </section>

            </main>

            <footer>

            </footer> 
       

  </body>
</html>





