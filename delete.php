<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 14/11/2018
 * Time: 21:58
 */

include_once("connection_data.inc");

$connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

if ($connexion->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    die();
}

$tableName = $_GET['ref'];
$field = "";
$value = $_GET['id'];

switch ($tableName) {
    case 'reserve':
        $field = "id_reserve";
        break;
    case 'lend':
        $field = "id_lend";
        break;
    case 'book':
        $field = "isbn";
        break;
    case 'users':
        $field = "dni";
        break;
}

$sentenciaSQL = "DELETE FROM " . $tableName . " WHERE " . $field . "='" . $value . "';";
echo $sentenciaSQL;
$sql_result = $connexion->query($sentenciaSQL);
header ("Location: pageListed.php?ref=".$tableName);


