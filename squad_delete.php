<?php

    include 'db.php';
    include 'config.php';

    session_start();

    if(!isset($_SESSION["user_id"])) {
        header('Location: ' . URL . 'login.php');
    }

    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }
?>

<?php

    $query = "SELECT * FROM tbl_players_222";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("DB query failed.");
    }

        $delete_player_Id = $_GET["delete_data"];
        $delete_player_query_players = "DELETE FROM tbl_players_222 WHERE id=" .$delete_player_Id;

        $delete_result = mysqli_query($connection, $delete_player_query_players);
        if($delete_result) {
        }
        else die("DB query failed.");

        $delete_player_query_users = "DELETE FROM tbl_users_222 WHERE user_id=" .$delete_player_Id;
        $delete_result = mysqli_query($connection, $delete_player_query_users);
        if($delete_result) {
        }
        else die("DB query failed.");

        $delete_player_query_stats = "DELETE FROM tbl_players_222 WHERE id=" .$delete_player_Id;
        $delete_result = mysqli_query($connection, $delete_player_query_stats);
        if($delete_result) {
        }
        else die("DB query failed.");

        header("Location: squad.php");
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
                        <li id="record_training"><img src="images/record_training.png"><a href="#"class="menu_button"><p>Record Training</p></a></li>
                        <li><img src="images/squad.png"><a href="#"class="menu_button"><p>Squad</p></a></li>
                        <li><img src="images/next_match.png"><a href="#"class="menu_button"><p>Next Match</p></a></li>
                        <li><img src="images/transfare_window_goals.png"><a href="#"class="menu_button"><p>Transfare Window Goals</p></a></li>
                        <li><img src="images/players_task_list.png"><a href="#"class="menu_button"><p>Players Task List</p></a></li>
                        <li><img src="images/add_player.png"><a href="addPlayer.php"class="menu_button"><p>Add Player</p></a></li>
                        <li id="settings"><img src="images/settings.png"><a href="#"class="menu_button"><p>Settings</p></a></li>
                        <li><a href="aboutus.php" class="menu_button"><img src="images/about_us.png"><p>About Us</p></a></li>
                        <li><a href="logout.php" class="menu_button"><img src="images/enter.png"><p>Log Out</p></a></li>
                    </ul>
                </nav>
                <img src="images/barcelona.png" id="symbol">
            </section>

        <main>
            <section id="breadcrumps">
                <span><a href="coach.php">Home Page</a> > <a href="squad.php">Squad</a></span>
            </section>

            <section id="content" style="overflow:auto">
                <div class="squad">

                    <?php
                        while($row = mysqli_fetch_assoc($result)) {
                        
                            if($row["shirt_num"] == NULL) break;

                        echo '<section onclick="location.href=' . "'squad_player.php?prodId=" . $row["id"] ."'" . '"><img src="' . $row["player_img"] . '"class="player"><p class="player_name">' . $row["player_name"] . '<br><br>' . $row["shirt_num"] . '</p><img src="' . $row["nationality_img"] . '"class="nationality"><a>' . $row["position"] . '</a>
                        <section class="activities"><button Location: ="squad_player.php?prodId=' . $row["id"] . '"><img src="images/enter.png"></button><button><img src="images/edit.png"></button><button class="delete_player"><img src="images/trash.png"></button></section></section>            
                        <section class="line"></section>';
                        }
                    ?>        
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

if(isset($delete_result) && is_resource($delete_result)){
    // 4. Release returned data
    mysqli_free_result($delete_result);
}

?>