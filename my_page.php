<?php

    include 'db.php';
    include 'config.php';

    session_start();

    if(!isset($_SESSION["user_id"])) {
        header('Location: ' . URL . 'login.php');
    }
    
    $prodId = $_GET["prodId"];
    $player_stats_query = "SELECT * FROM tbl_stats_222 WHERE id=" .$prodId;

    $stats_result = mysqli_query($connection, $player_stats_query);
    if($stats_result) {
        $row = mysqli_fetch_assoc($stats_result);
    }
    else die("DB query failed.");

    $player_query = "SELECT * FROM tbl_players_222 WHERE id=" .$prodId;

    $player_result = mysqli_query($connection, $player_query);
    if($player_result) {
        $player_row = mysqli_fetch_assoc($player_result);
    }
    else die("DB query failed.");

    $user_query = "SELECT * FROM tbl_users_222 WHERE user_id=" .$prodId;

    $user_result = mysqli_query($connection, $user_query);
    if($user_result) {
        $user_row = mysqli_fetch_assoc($user_result);
    }
    else die("DB query failed.");

    $task_query = "SELECT * FROM tbl_tasks_222 WHERE task_id=" . $player_row["task_id"];

    $task_result = mysqli_query($connection, $task_query);
    if($task_result) {
        $task_row = mysqli_fetch_assoc($task_result);
    }
    else die("DB query failed.");

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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <section id="breadcrumps">
                <span><a href="index.php">Home Page</a> > <a href="squad.php">Squad</a> > <a href="squad_player.php">Player</a></span>
            </section>

            <section id="content" style="overflow:auto">
                <div class="squad">

                    <section class="stats_table">                    
                        <section class="headline">
                            <?php

                                echo '<img src="' . $player_row["player_img"] . '"class="player"><p class="player_name">' . $player_row["player_name"] . '<br><br>' . $player_row["shirt_num"] . '</p><img src="' . $player_row["nationality_img"] . '"class="nationality"><a>' . $player_row["position"] . '</a>' . '<p id="stats_tasks">' . $player_row["tasks"] . '</p>';

                            ?>
                        </section>

                        <section class="attributes">
                            <?php
                         
                                echo '<p>Physical<br><br><br>Fit: <span>' . $row["fit"] . '</span><br>Age: <span>' . $row["age"] . '</span><br>Height: <span>' . $row["height"] . 'cm</span><br>Weight: <span>' . $row["weight"] . 'kg</span><br>Speed: <span>' . $row["speed"] . 'km/h</span></p>';
                                echo '<p>Attack<br><br><br>Goals: <span>' . $row["goals"] . '</span><br>Shots acc.: <span>' . $row["shots_acc"] . '%</span><br>Dribbles(%): <span>' . $row["dribbles"] . '%</span><br>Key dribbles: <span>' . $row["key_dribbles"] . '</span><br></p>';
                                echo '<p>Passes<br><br><br>Assists: <span>' . $row["assists"] . '</span><br>Passes (%): <span>' . $row["passes"] . '%</span><br>Key passes: <span>' . $row["key_passes"] . '</span></p>';
                                echo '<p>Tackles<br><br><br>tackles(%): <span>' . $row["tackles"] . '%</span><br>In oppos. side: <span>' . $row["in_oppos"] . '</span></p>';
                                echo '<p>Summery<br><br><br>Strength<br><span>' . $row["strengths"] . '</span><br><br>Weaknesses:<br><span>' . $row["weaknesses"] . '</span></p>';

                            ?>
                        </section>
                    </section>                
                
                <section class="stats_activities"><button id="player_task_button"><img src="images/exercises.png"></button><button><img src="images/Message.png"></button>
                </section>
            </section>

            <div id="player_task_popup">
                <form action = "player_task.php" method = "GET">
                    <div>Tasks:</div><br>
                        <?php 
                            echo '<p>' . $task_row["description"] . '</p>';
                        ?>
                    <span><button type = "submit" name="player_id" id = "player_task_yes" <?php echo 'value ='. $prodId . ''?>>Complete</button><button type="button" id = "player_task_no">Cancel</button></span>
                </form>
            </div>
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
if(isset($stats_result) && is_resource($stats_result)){
    // 4. Release returned data
    mysqli_free_result($stats_result);
}
if(isset($player_result) && is_resource($player_result)){
    // 4. Release returned data
    mysqli_free_result($player_result);
}
if(isset($user_result) && is_resource($user_result)){
    // 4. Release returned data
    mysqli_free_result($user_result);
}
if(isset($task_result) && is_resource($task_result)){
    // 4. Release returned data
    mysqli_free_result($task_result);
}

?>