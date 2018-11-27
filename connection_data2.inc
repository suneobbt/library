
<?php
//datos_conexion.inc
$mysql_server = "localhost:3307";
$mysql_login = "root";
$mysql_pass = "AB.Root18";

$connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

if ($connexion->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    die();
}

?>
