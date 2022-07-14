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

    $name = $_GET["fullName"];
    $player_img = $_GET["player_image"];
    $nationality = $_GET["nationality"];
    $position = $_GET["position"];
    $age = $_GET["age"];
    $shirt_num = $_GET["shirt_num"];

    $edit_player_Id = $_GET["edit_data"];
    $edit_player_query = "SELECT * FROM tbl_players_222 WHERE id=" .$edit_player_Id;
    $edit_result = mysqli_query($connection, $edit_player_query);
    if($edit_result) {
        $row = mysqli_fetch_assoc($edit_result);
    }
    else die("DB query failed.");

    $edit = "UPDATE tbl_players_222 SET player_img = '$player_img', player_name = '$name', nationality_img = '$nationality', position = '$position', shirt_num = '$shirt_num' WHERE id=" .$edit_player_Id;
    $edit_player = mysqli_query($connection, $edit);
        if($edit_player) {
        }
        else die("DB query failed.");

        $edit_user = "UPDATE tbl_users_222 SET name = '$name' WHERE user_id=" .$edit_player_Id;
        $edit_user_table = mysqli_query($connection, $edit_user);
            if($edit_user_table) {
            }
            else die("DB query failed.");
    

    header("Location: squad.php");

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
                        <section class="activities"><button Location: ="squad_player.php?prodId=' . $row["id"] . '"><img src="images/enter.png"></section></section>            
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

if(isset($edit_result) && is_resource($edit_result)){
    // 4. Release returned data
    mysqli_free_result($edit_result);
}

if(isset($edit_player) && is_resource($edit_player)){
    // 4. Release returned data
    mysqli_free_result($edit_player);
}

if(isset($edit_user_table) && is_resource($edit_user_table)){
    // 4. Release returned data
    mysqli_free_result($edit_user_table);
}

?>