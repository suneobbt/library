<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 12:23
 */

include_once('User.php');

//$work_user=new User($_GET['sessionName']);
// $work_user created on first include in extendedUser_toolsMenu

echo "
    <h3>Welcome!</br> You are logged in as " . $work_user->getName() . " " . $work_user->getSurname() . "." . " </h3>
    <form action=\"index.php\">
        <input type=\"submit\" value=\"Log Out\" />
    </form>";


