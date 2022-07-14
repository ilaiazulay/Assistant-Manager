<?php

    include 'db.php';

    $name = $_GET["fullName"];
    $email = $_GET["player_email"];
    $password = $_GET["player_password"];
    $player_img = $_GET["player_image"];
    $nationality = $_GET["nationality"];
    $position = $_GET["position"];
    $age = $_GET["age"];
    $shirt_num = $_GET["shirt_num"];

    $query = "INSERT INTO tbl_players_222 (player_name, player_img, nationality_img, position, shirt_num) VALUES ('$name', '$player_img', '$nationality', '$position', $shirt_num);";
    mysqli_query($connection, $query);


    $id = "SELECT * FROM tbl_players_222 WHERE shirt_num =" .$shirt_num;
    $id_result = mysqli_query($connection, $id);
        if($id_result) {
            $row = mysqli_fetch_assoc($id_result);
        }
        else die("DB query failed.");
    $rowId = $row["id"];
    $newid = "INSERT INTO tbl_stats_222 (id) VALUES ('$rowId');";
    mysqli_query($connection, $newid);

    $users_query = "INSERT INTO tbl_users_222 (user_id, name, email, password) VALUES ('$rowId','$name', '$email', '$password');";
    mysqli_query($connection, $users_query);

    header("Location: ./coach.php");

?>
