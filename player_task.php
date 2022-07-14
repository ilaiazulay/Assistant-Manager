<?php

    include 'db.php';
    include 'config.php';

    session_start();

    if(!isset($_SESSION["user_id"])) {
        header('Location: ' . URL . 'login.php');
    }
    
$playerId = $_GET["player_id"];
$query = "SELECT * FROM tbl_stats_222 WHERE id=" .$playerId;

$result = mysqli_query($connection, $query);
if($result) {
    $player_row = mysqli_fetch_assoc($result);
}
else die("DB query failed.");

$complete_task = "UPDATE tbl_players_222 SET tasks = 'there is no tasks', task_id = '0' WHERE id=" .$playerId;
$complete_task_player = mysqli_query($connection, $complete_task);
    if($complete_task_player) {
    }
    else die("DB query failed.");

    header('Location: player.php?id='.$playerId);

?>

<!DOCTYPE html>
<html>

	<head>
        <meta charset="UTF-8">
		<title>Assistant Manager</title>
        <link rel="stylesheet" href="css/style.css">  
        <link rel="icon" href="favicon.ico">              
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <script src="player.js"></script>
	</head>

	<body>

            <header>
                <a <?php echo 'href="player.php?id=' . $prodId . '"' ?> class="header-elements logo"></a>
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
                            <li><img src="images/squad.png"><a <?php echo 'href="my_page.php?prodId=' . $row["id"] . '"' ?>class="menu_button"><p>My Page</p></a></li>
                            <li><img src="images/next_match.png"><a href="#"class="menu_button"><p>Next Match</p></a></li>
                            <li id="settings"><img src="images/settings.png"><a href="#"class="menu_button"><p>Settings</p></a></li>
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

if(isset($result) && is_resource($result)){
    // 4. Release returned data
    mysqli_free_result($result);
}

if(isset($complete_task_player) && is_resource($complete_task_player)){
    // 4. Release returned data
    mysqli_free_result($complete_task_player);
}

?>