<?php
/*
 * index.php
 * 2018-10-08
 * 
 * Copyright 2018 Adrià Babot <daw2ababotllinares@iesjoanramis.org>
 */
session_cache_limiter('nocache,private');
session_start();

include("connection_data.inc");

// connecting to BD
$connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

if ($connexion->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    die();
}

$sentenciaSQL = "SELECT dni,user_type FROM users where dni='$_POST[user]' and pass='$_POST[pass]';";
echo $sentenciaSQL;

$sql_result = $connexion->query($sentenciaSQL);

/**LOG IN NOK*/
if (!$sql_result->num_rows) {
    header("Location:http://localhost/library/index.php?msg=802");
    die();
}

/**Extract the necessary values*/
while ($row = mysqli_fetch_assoc($sql_result)) {
    $_SESSION['user_id'] = $row['dni'];
    $_SESSION['user_type'] = $row['user_type'];
}

$_SESSION['session_id'] = session_id();

header("Location:http://localhost/library/pageUser.php"); /*LOG IN OK*/

mysqli_close($connexion);

?>