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
    <title>Ilai Azulay</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="coach.js"></script>
</head>

<body>

    <header>
        <a href="index.php" class="header-elements logo"></a>
        <input type="text" class="header-elements search" placeholder=" Search..">
        <button class="header-elements arrow"><img src="images/arrow.png"></button>
        <button class="header-elements coach"><img src="images/coach.png"></button>
        <button class="header-elements chat"><img src="images/chat.png"></button>
        <button class="header-elements allert"><img src="images/allert.png"></button>
        <button id="hamburger"><img src="images/hamburger.png"></button>
    </header>

        <section id="left-side">
            <nav class="menu">
                <ul>
                    <li id="record_training"><img src="images/record_training.png">
                        <a href="#"> 
                            <p>Record Training</p>
                        </a>
                    </li>
                    <li><img src="images/squad.png">
                        <a href="squad.php">
                            <p>Squad</p>
                        </a>
                    </li>
                    <li><img src="images/next_match.png">
                        <a href="#">
                            <p>Next Match</p>
                        
                        </a>
                    </li>
                    <li><img src="images/transfare_window_goals.png">
                        <a href="#">
                            <p>Transfare Window Goals</p>
                        </a>
                    </li>
                    <li><img src="images/players_task_list.png">
                        <a href="#">
                            <p>Players Task List</p>
                        </a>
                    </li>
                    <li id="selected"><img src="images/add_player.png">
                        <a href="#">
                            <p>Add Player</p>
                        </a>
                    </li>
                    <li id="settings"><img src="images/settings.png">
                        <a href="#">
                            <p>Settings</p>
                        </a>
                    </li>
                    <li><img src="images/about_us.png">
                        <a href="aboutus.php">
                            <p>About Us</p>
                        </a>
                    </li>
                </ul>            
                <li><a href="logout.php" class="menu_button"><img src="images/enter.png"><p>Log Out</p></a></li>
            </nav>
            

            <img src="images/barcelona.png" id="symbol">
        </section>

    <main>
        <section id="breadcrumps">
            <span><a href="index.php">Home Page</a> > <a href="addplayer.php">Add Player</a></span>
        </section>

        <section id="content" style="overflow:auto">
            <!-- <div class="squad"> -->
            <!-- form -->

            <h1>Integration into the team:</h1>


            <!-- form action="http://se.shenkar.ac.il/teach/web1/get_form3.php " method="GET" -->
            <form action="get_params_login.php" method="GET">
                <div class="field">
                    <label> Full Name: <br>
                        <input type="text" name="fullName">
                    </label>
                </div>

                <div class="field">
                    <label> Email: <br>
                        <input type="email" name="player_email">
                    </label>
                </div>

                <div class="field">
                    <label> Password: <br>
                        <input type="password" name="player_password" value ="111111">
                    </label>
                </div>

                <div class="field">
                    <label> Player Img URL: <br>
                        <input type="text" name="player_image" value = "images/default.png">
                    </label>
                </div>

                <div class="field">
                    <label> Nationality:</label><br>
                    <select id="form_nationality" name = "nationality">
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
                        <input type="text" id="num" name = "shirt_num">
                    </label>
                </div>

                <div class="field"></div>
                    <!-- <a href="#" class="button glow-button">Add Player</a> -->
                    <input id="submit-button" class="btn btn-outline-primary" type="submit" value="Add Player"><br><br>

                </div>
        </section>
        <!-- end form -->
    </main>

    <footer>

    </footer>

</body>

</html>

<?php

mysqli_close($connection);

?>