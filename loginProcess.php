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

$sentenciaSQL = "SELECT dni FROM users where dni='$_POST[user]' and pass='$_POST[pass]';";
echo $sentenciaSQL;

$sql_result = $connexion->query($sentenciaSQL);

/**LOG IN NOK*/
if (!$sql_result->num_rows) {
    header("Location:http://localhost/library/index.php?mser=802");
    die();
}

/**Extract the necessary values*/
while($row = mysqli_fetch_assoc($sql_result)) {
    $user = $row['dni'];
}

session_name($user);

header("Location:http://localhost/library/pageUser.php?sessionName=" . session_name() ."&" . "id=" . session_id()); /*LOG IN OK*/

mysqli_close($connexion);

?>