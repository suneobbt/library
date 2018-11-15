<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 12:23
 */

include_once('User.php');

$work_user=new User($_SESSION['user_id']);
// $work_user created on first include in extendedUser_toolsMenu

echo "
    <h3>You are logged in as " . $work_user->getName() . " " . $work_user->getSurname() . "." . " </h3>
    <form action=\"logOut.php\">
        <input type=\"submit\" value=\"Log Out\" />
    </form>";


