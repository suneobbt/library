<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 13:02
 */

include_once('User.php');

// $work_user=new User($_GET['sessionName']);
// $work_user created on first include in extendedUser_toolsMenu

switch ($work_user->getUserType()) {
    case 0:
        ?>
        <article>
            <h3>Find your next book</h3>
            <form method="post">
                <label for="search">Search for it</label>
                <input type="text" name="search" id="search" placeholder="ISBN, title, author..."
                required=""/>
                <input type="submit" value="Search"/>
            </form>
        </article>
        <article>
            <h3>BooksReserves</h3>

            <?php include('reservesSectionList.php'); ?>

        </article>
        <article>
            <h3>Recomendations</h3>
            In iaculis tortor quis nulla congue finibus. Curabitur egestas efficitur elementum.
        </article>
        <?php
        break;
    //end case 0

    case 1:
        ?>
        <article>
            <h3>Return & pickup books</h3>
            <form method="post" action="">
                <label for="search">Search </label>
                <input type="text" name="search" id="search" placeholder="ISBN" required=""/>
                <input type="submit" value="Submit"/>
            </form>
        </article>

        <article>
            <h3>Edit User</h3>
            <form method="post" action="register.php?form=superEdit\">
                <label for="search">Search </label>
                <input type="text" name="searchUser" id="searchUser" placeholder="DNI" required=""/>
                <input type="submit" value="Search"/>
            </form>
        </article>

        <article>
            <h3>Find a book</h3>
            <label for="search">Search </label>
            <input type="text" name="search" id="search" placeholder="ISBN, title, author..." required=""/>
            <input type="submit" value="Search"/>
        </article>

        <article>
            <h3>Return book</h3>
            In iaculis tortor quis nulla congue finibus. Curabitur egestas efficitur elementum.
        </article>

        <?php
        break;
    //end case 1

    case 2:
        //TODO Implement html code for admin
        ?>


        <?php
        break;
    //end case 2
}
