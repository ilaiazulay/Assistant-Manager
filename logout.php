<?php

include 'db.php';
include 'config.php';

session_destroy();
header('Location: ' . URL . 'index.php');

?>

<?php

mysqli_close($connection);

?>