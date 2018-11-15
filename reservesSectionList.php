<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 14:40
 */

include("connection_data.inc");

$connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

if ($connexion->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    die();
}
$dni=$_SESSION['user_id'];

// TODO: Adapt $Sentencia to object user
$sentenciaSQL = "SELECT reserve.id_reserve, reserve.start_time_reserve, copy.isbn, book.title 
    FROM reserve JOIN copy 
        on copy.id_copy = reserve.id_copy 
        JOIN book 
            on copy.isbn=book.isbn where reserve.dni='$dni' ";

$sql_result = $connexion->query($sentenciaSQL);
?>

<table class="tableSection" align=center>
    <tr>
    <td><b>Pick up date</b></td>
    <td><b>Title</b></td>
    <td><b>ISBN</b></td>
    <td><b>ID Reserve</b></td>
    </tr>

<?php
while ($row = mysqli_fetch_assoc($sql_result)) {
    echo
        "<tr><td>" . $row ['start_time_reserve'] .
        "</td><td>" . $row ['title'] .
        "</td><td>" . $row ['isbn'] .
        "</td><td>" . $row ['id_reserve'] . "</td></tr>";
}
echo "</table>";
mysqli_close($connexion);
?>