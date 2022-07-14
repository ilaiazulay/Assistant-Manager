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

    $task_query = "SELECT * FROM tbl_tasks_222";

    $task_result = mysqli_query($connection, $task_query);
    if($task_result) {
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
        <script src="coach.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <span><a href="coach.php">Home Page</a> > <a href="squad.php">Squad</a> > <a href="squad_player.php">Player</a></span>
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
                
                <section class="stats_activities"><button id="stats_task_player"><img src="images/exercises.png"></button><button><img src="images/Message.png"></button><button id="stats_edit_player"><img src="images/edit.png"></button>
                <button name="delete_player" id="stats_delete_player"><img src="images/trash.png"></button></section>
            </section>

            <div id="delete_player_popup">
                <form action="squad_delete.php" method = "GET">
                    <div>Are you sure you want to delete this player?</div><br>
                    <span><button type = "submit" name="delete_data" id = "delete_player_yes" <?php echo 'value ='.$prodId . ''?>>Yes</button><button type="button" id = "delete_player_no">No</button></span>
                </form>
            </div>

            <div id="task_player_popup">
                <form action="squad_task.php" method = "GET">
                    <div>Send one of these following tasks:</div><br>
                        <div class="field">
                            <label> Tasks:</label><br>
                            <select id="form_nationality" name = "task">
                                <?php while($task_row = mysqli_fetch_assoc($task_result)) {

                                        if($task_row["task_id"] == NULL) break;

                                    echo '<option value ='.$task_row["task_id"] . '>' .$task_row["title"] . '</option>';
                                }
                                ?>
                            </select>
                            </label>
                        </div>
                    <span><button type = "submit" name="task_data" id = "task_player_yes" <?php echo 'value ='.$prodId . ''?>>Apply</button><button type="button" id = "task_player_no">Cancel</button></span>
                </form>
            </div>

            <div id="edit_player_popup">
                <form action="squad_edit.php" method = "GET">
                    <div>You can change the following:</div><br>

                    <div class="field">
                        <label> Full Name: <br>
                            <input type="text" name="fullName" id = "edit_name" <?php echo 'value ='.$player_row["player_name"] . ''?>>
                        </label>
                    </div>

                    <div class="field">
                        <label> Player Img URL: <br>
                            <input type="text" name="player_image" <?php echo 'value ='.$player_row["player_img"] . ''?> id = "edit_image">
                        </label>
                    </div>

                    <div class="field">
                        <label> Nationality:</label><br>
                        <select id="form_nationality" name = "nationality">
                            <?php echo '<option selected value ='.$player_row["nationality_img"] . '></option>'?>
                            <option value = "images/argentina.png">argentina</option>
                            <option value = "images/brazil.png">brazil</option>
                            <option value = "images/england.png">england</option>
                            <option value = "images/france.png">france</option>
                            <option value = "images/germany.png">germany</option>
                        </select>
                        </label>
                    </div>

                    <div class="field">
                        <label>Position:</label><br>
                        <select id="position" name = "position">
                            <?php echo '<option selected value ='.$player_row["position"] . '></option>'?>
                            <option value = "GoalKeeper">GoalKeeper</option>
                            <option value = "Right Fullback">Right Fullback</option>
                            <option value = "Left Fullback">Left Fullback</option>
                            <option value = "Center Back">Center Back</option>
                            <option value = "Defending Midfielder">Defending Midfielder</option>
                            <option value = "Right Midfielder">Right Midfielder</option> 
                            <option value = "Central Midfielder">Central Midfielder</option>
                            <option value = "Striker">Striker</option>
                            <option value = "Attacking Midfielder">Attacking Midfielder</option>
                            <option value = "Left Midfielder">Left Midfielder</option>
                        </select>
                    </div>

                    <div class="field">
                        <label> Age: <br>
                            <input type="number" id="datePosition" name = "age" min = "18" max = "40">
                        </label>
                    </div>

                    <div class="field">
                        <label> Shirt Number: <br>
                            <input type="text" id="num" name = "shirt_num" <?php echo 'value ='.$player_row["shirt_num"] . ''?>>
                        </label>
                    </div>

                    <span><button type = "submit" name="edit_data" id = "edit_player_yes" <?php echo 'value ='.$prodId . ''?>>Apply</button><button type="button" id = "edit_player_no">Cancel</button></span>
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

if(isset($stats_result) && is_resource($stats_result)){
    // 4. Release returned data
    mysqli_free_result($stats_result);
}

if(isset($player_result) && is_resource($player_result)){
    // 4. Release returned data
    mysqli_free_result($player_result);
}

if(isset($task_result) && is_resource($task_result)){
    // 4. Release returned data
    mysqli_free_result($task_result);
}

?>