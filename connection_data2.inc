
<?php
include ("connection_data.inc");
$connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

if ($connexion->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    die();
}

?>
