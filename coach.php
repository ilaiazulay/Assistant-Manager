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
        <meta charset="UTF-8">
		<title>Assistant Manager</title>
        <link rel="stylesheet" href="css/style.css">  
        <link rel="icon" href="favicon.ico">              
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <script src="coach.js"></script>
	</head>

	<body>

            <header>
                <a href="coach.php" class="header-elements logo"></a>
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
                            <li id="record_training"><img src="images/record_training.png"><a href="coach.php"class="menu_button"><p>Record Training</p></a></li>
                            <li><img src="images/squad.png"><a href="squad.php"class="menu_button"><p>Squad</p></a></li>
                            <li><img src="images/next_match.png"><a href="coach.php"class="menu_button"><p>Next Match</p></a></li>
                            <li><img src="images/transfare_window_goals.png"><a href="coach.php"class="menu_button"><p>Transfare Window Goals</p></a></li>
                            <li><img src="images/players_task_list.png"><a href="coach.php"class="menu_button"><p>Players Task List</p></a></li>
                            <li><img src="images/add_player.png"><a href="addPlayer.php"class="menu_button"><p>Add Player</p></a></li>
                            <li id="settings"><img src="images/settings.png"><a href="coach.php"class="menu_button"><p>Settings</p></a></li>
                            <li><a href="aboutus.php" class="menu_button"><img src="images/about_us.png"><p>About Us</p></a></li>
                            <li><a href="logout.php" class="menu_button"><img src="images/enter.png"><p>Log Out</p></a></li>
                        </ul>
                    </nav>
                    <img src="images/barcelona.png" id="symbol">
                </section>

                <main>
                <section id="section2">
                    <a href="#" class="boxes">
                        <img src="images/camera-video.png" alt="" class="picBox">
                        <h3 class="hBox">Record of training</h3>
                    </a>
        
                    <a href="#" class="boxes">
                        <img src="images/liste-de-souhaits.png" alt="" class="picBox">
                        <h3 class="hBox">Tasks</h3>
                    </a>
        
                    <a href="#" class="boxes">
                        <img src="images/fluctuation.png" alt="" class="picBox">
                        <h3 class="hBox">Stats</h3>
                    </a>
        
                    <a href="#" class="boxes">
                        <img src="images/stop-watch.png" alt="" class="picBox">
                        <h3 class="hBox">Stop watch</h3>
                    </a>
        
                    <a href="#" class="boxes">
                        <img src="images/match-box.png" alt="" class="picBox">
                        <h3 class="hBox">Next match</h3>
                    </a>
        
                    <a href="#" class="boxes">
                        <img src="images/team.png" alt="" class="picBox">
                        <h3 class="hBox">Team Player's</h3>
                    </a>
                </section>

            </main>

            <footer>

            </footer> 
       
	</body>

</html>

<?php

mysqli_close($connection);

?>