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
        ?>
        <h2>Actions</h2>
        <div class="list-group">
            <a class="list-group-item list-group-item-action text-primary" href="pageUser.php">Home panel</a><br/>
            <a class="list-group-item list-group-item-action text-primary"
               href="pageListed.php?ref=reserve">Reserves</a><br/>
            <a class="list-group-item list-group-item-action text-primary"
               href="pageForm.php?id=new&ref=reserve">New reserve</a><br/>
            <a class="list-group-item list-group-item-action text-primary" href="pageListed.php?ref=lend">Lends</a><br/>
            <a class="list-group-item list-group-item-action text-muted " href="#">Statistics</a><br/>
        </div>

        <?php
        break;
    //end case 0


    case 1:
        ?>
        <h2>Actions</h2>
        <div class="list-group">
            <a class="list-group-item list-group-item-action text-primary" href="pageUser.php">Home panel</a><br/>
            <a class="list-group-item list-group-item-action text-primary"
               href="pageListed.php?ref=users">Users</a><br/>
            <a class="list-group-item list-group-item-action text-primary" href="pageForm.php?id=new&ref=users">Add
                user</a><br/>
            <a class="list-group-item list-group-item-action text-primary"
               href="pageListed.php?ref=book">Books</a><br/>
            <a class="list-group-item list-group-item-action text-primary" href="pageForm.php?id=new&ref=book">Add
                book</a><br/>
            <a class="list-group-item list-group-item-action text-primary"
               href="pageListed.php?ref=reserve">Reserves</a><br/>
            <a class="list-group-item list-group-item-action text-primary"
               href="pageForm.php?id=new&ref=reserve">New reserve</a><br/>
            <a class="list-group-item list-group-item-action text-primary"
               href="pageListed.php?ref=lend">Lends</a><br/>
            <a class="list-group-item list-group-item-action text-primary" href="pageForm.php?id=new&ref=lend">New
                lend</a><br/>
            <a class="list-group-item list-group-item-action text-muted" href="#">Statistics</a><br/>
        </div>
        <?php
        break;
    //end case 1


    case 2:
        ?>
        <h2>Actions</h2>
        <div class="list-group">
            <a class="list-group-item list-group-item-action text-primary" href="pageUser.php">Home panel</a><br/>
            <a class="list-group-item list-group-item-action text-primary"
               href="pageListed.php?ref=users">Users</a><br/>
            <a class="list-group-item list-group-item-action text-primary" href="pageForm.php?id=new&ref=users">Add
                user</a><br/>
            <a class="list-group-item list-group-item-action text-primary" href="pageListed.php?ref=book">Books</a><br/>
            <a class="list-group-item list-group-item-action text-primary" href="pageForm.php?id=new&ref=book">Add book</a><br/>
            <a class="list-group-item list-group-item-action text-primary"
               href="pageListed.php?ref=reserve">Reserves</a><br/>
            <a class="list-group-item list-group-item-action text-primary" href="pageForm.php?id=new&ref=reserve">New
                reserve</a><br/>
            <a class="list-group-item list-group-item-action text-primary" href="pageListed.php?ref=lend">Lends</a><br/>
            <a class="list-group-item list-group-item-action text-primary" href="pageForm.php?id=new&ref=lend">New
                lend</a><br/>
            <a class="list-group-item list-group-item-action text-muted" href="#">Statistics</a><br/>
        </div>
        <?php
        break;
    //end case 2
}