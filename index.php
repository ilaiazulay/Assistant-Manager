<?php
    include 'db.php';
    include 'config.php';

    if(!empty($_POST["loginMail"])) {

        $query = "SELECT * FROM tbl_users_222 WHERE email='"
        . $_POST["loginMail"]
        . "' and password = '"
        . $_POST["loginPass"]
        ."'";

        $permission = "SELECT permission FROM tbl_users_222 WHERE email='"
        . $_POST["loginMail"]
        . "' and password = '"
        . $_POST["loginPass"]
        ."'";

        $result = mysqli_query($connection , $query);
        $permission_result = mysqli_query($connection , $permission);
        $row = mysqli_fetch_array($result);
        $permission_array = mysqli_fetch_array($permission_result);


        if(is_array($row)) {
            echo 'authontication success!';
            
            session_start();
            $_SESSION["user_id"] = $row['user_id'];
            echo $_SESSION["user_id"];
            
            if($permission_array[0] == "coach")
                    {
                        header('Location: ' . URL . 'coach.php');
                    }
                    else
                    {
                        header('Location: ' . URL . 'player.php?id=' . $row["user_id"]);
                    }
        } else {
            echo 'authontication failed!';
            $message = "Invalid Username or Password";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">  
    <link rel="icon" href="favicon.ico">              
    <title>Assistant Manager</title>
</head>
<body>

    <div id="login_image"></div>
    <div class="login_container">
       <form action="#" method="post" id="frm">
           <div class="form-group">
               <label for="loginMail">Email: </label>
                <input type="email" class="form-control" name="loginMail" id="loginMail" aria-describedby="emailHelp" placeholder="Enter email">
           </div>
            <div class="form-group">
               <label for="loginPass">Password: </label>
               <input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="Enter Password">
           </div>
           <br>
           <button type="submit" class="btn btn-primary" id="login_button">Log Me In</button>
           <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>   
        </form>
 	</div>
</body>
</html>

<?php

mysqli_close($connection);

if(isset($result) && is_resource($result)){
    // 4. Release returned data
    mysqli_free_result($result);
}

if(isset($permission_result) && is_resource($permission_result)){
    // 4. Release returned data
    mysqli_free_result($permission_result);
}

?>