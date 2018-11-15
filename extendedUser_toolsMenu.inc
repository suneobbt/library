<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 14:03
 */

include('User.php');

/*$work_user=new User($_GET['sessionName']);
$user_type=$work_user->getUserType();*/

switch ($_SESSION['user_type']) {

    case 0:
        echo "
            <h2>Actions</h2>
            <a href=\"register.php?sessionName=".$_SESSION['user_id']."&form=userEdit\">My data</a></br>
            <a href=\"pageListed.php?ref=reserve\">Reserves</a></br>
            <a href=\"estadistics.php\">Estadistics</a></br>
            <a href=\"index.php\">Stadistics</a></br>";
        break;
    //end case 0


    case 1:
        echo "
            <h2>Actions</h2>
            <a href=\"\">Home panel</a></br>
            <a href=\"pageListed.php\">Defaulters</a></br>
            <a href=\"pageListed.php?ref=users\">Users</a></br>
            <a href=\"pageBook.php\">Add book</a></br>
            <a href=\"pageListed.php?ref=reserve\">Reserves</a></br>
            <a href=\"pageListed.php?ref=lend\">Lends</a></br>
            <a href=\"index.php\">Stadistics</a></br>";
        break;
    //end case 1


    case 2:
        echo "
            <h2>Actions</h2>
            <a href=\"register.php\">My data</a></br>
            <a href=\"register.php?form=superEdit\">Edit user</a></br>
            <a href=\"register.php\">Edit librarian</a></br>
            <a href=\"pageListed.php\">Defaulters</a></br>
            <a href=\"pageListed.php?ref=users\">Users</a></br>
            <a href=\"pageBook.php\">Add book</a></br>
            <a href=\"pageListed.php?ref=reserve\">Reserves</a></br>
            <a href=\"pageListed.php?ref=lend\">Lends</a></br>
            <a href=\"index.php\">Stadistics</a></br>";
        break;
    //end case 2
}