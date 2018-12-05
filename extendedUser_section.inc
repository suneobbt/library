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
            <form method="post" action="pageListed.php?ref=book">
                <label for="patternSearch">Search</label>
                <input type="text" name="patternSearch" id="patternSearch" required=""/><br/>

                <label for="fieldSearch">Search by: </label>
                <select id="fieldSearch" name="fieldSearch" required="">
                    <option value="isbn" selected="selected">ISBN</option>
                    <option value="title">Title</option>
                    <option value="author">Author</option>
                    <option value="editorial">Editorial</option>
                    <option value="year">Year</option>
                    <option value="category">Category</option>
                    <option value="language">Language</option>
                </select><br/>

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
            <h3>Find a book</h3>
            <form method="post" action="pageListed.php?ref=book">
                <label for="patternSearch">Search:</label>
                <input type="text" name="patternSearch" id="patternSearch" required=""/>
                <label for="fieldSearch">Search by: </label>
                <select id="fieldSearch" name="fieldSearch" required="">
                    <option value="isbn" selected="selected">ISBN</option>
                    <option value="title">Title</option>
                    <option value="author">Author</option>
                    <option value="editorial">Editorial</option>
                    <option value="year">Year</option>
                    <option value="category">Category</option>
                    <option value="language">Language</option>
                </select>
                <input type="submit" value="Search"/>
            </form>

        </article>

        <article>
            <h3>ACT 3</h3>

        </article>

        <article>
            <h3>ACT 4</h3>

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
