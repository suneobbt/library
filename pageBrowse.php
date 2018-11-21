<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 15/11/2018
 * Time: 20:38
 */

session_cache_limiter('nocache,private');
session_start();

include('confirmIfSessionSet.php');

?>

<!DOCTYPE html>

<html>

<head>
    <title>The Library - Browse </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
<header>
    <h1><a href="index.php">The Library</a></h1>
    <h2>Where knowledge occupies place</h2>
</header>

<nav>Link1 | Link2 | Link3 | Link4</nav>

<main>
    <!-- Aside 1(left top) for tools acces -->
    <aside id="ad1">
        <?php include('extendedUser_toolsMenu.inc'); ?>
    </aside>

    <!-- Aside 2(right top) for login -->
    <aside id="ad2">
        <?php include('loggedInAs.inc') ?>
    </aside>

    <section>

        <?php
        require_once("MakeForm.php");
        require_once("Book.php");
        require_once("Lend.php");
        require_once("Reserve.php");
        //lets modify some tables

        $tableName = $_GET['ref'];
        $id = $_GET['id'];

        $form = new MakeForm("modifyProcess.php?ref=" . $tableName, "Modify " . $tableName);
        //TODO: Implement form creator

        switch ($tableName) {
            case 'book':
                $work_book = new Book($id);
                $form->addField("isbn", "ISBN", "text", "required", "", $work_book->getIsbn());
                $form->addField("title", "Title", "text", "", "required", $work_book->getTitle());
                $form->addField("author", "Author", "text", "", "required", $work_book->getAuthor());
                $form->addField("editorial", "Editorial", "text", "required", "", $work_book->getEditorial());
                $form->addField("edition", "Edition", "text", "", "", $work_book->getEdition());
                $form->addField("year", "Year", "text", "required", "", $work_book->getYear());
                $form->addField("category", "Category", "text", "", "", $work_book->getCategory());
                $form->addField("language", "Language", "text", "required", "", $work_book->getLanguage());
                $form->addField("description", "Description", "text", "", "", $work_book->getDescription());
                $form->addField("book_condition", "Book Condition", "text", "", "", $work_book->getBookCondition());
                $form->addField("continuous_of", "Continuous Of", "text", "", "", $work_book->getContinuousOf());
                $form->addField("continued_by", "Continued By", "text", "", "", $work_book->getContinuedBy());
                break;

            case 'users':
                $work_user = new User($id);
                $form->addField("dni", "DNI", "text", "required", "", $work_user->getDni());
                $form->addField("name", "Name", "text", "required", "", $work_user->getName());
                $form->addField("surname", "Surname", "text", "required", "", $work_user->getSurname());
                $form->addField("pass", "Password", "password", "required", "", $work_user->getPass());
                $form->addField("email", "E-Mail", "email", "required", "", $work_user->getEmail());
                $form->addField("user_type", "User Type (0-Normal user, 1-Librarian, 2-Administrator)", "text", "required", "", $work_user->getUserType());
                $form->addField("phone_number", "Phone Number", "text", "required", "", $work_user->getPhoneNumber());
                $form->addField("direction", "Direction", "text", "", "", $work_user->getDirection());
                $form->addField("city", "City", "text", "", "", $work_user->getCity());
                $form->addField("postal_code", "Postal Code", "text", "", "", $work_user->getPostalCode());

                break;

            case 'lend':
                $work_lend = new Lend($id);
                $form->addField("lend_id", "Lend ID", "text", "required", "", $work_lend->getIdLend());
                $form->addField("start_time_lend", "Start day of the lend", "date", "required", "", $work_lend->getStartTimeLend());
                $form->addField("dni", "DNI", "text", "required", "", $work_lend->getDni());
                $form->addField("copy_id", "Copy ID", "text", "required", "", $work_lend->getIdCopy());


                break;

            case 'reserve':
                $work_reserve = new Reserve($id);
                $form->addField("reserve_id", "Reserve ID", "text", "required", "", $work_reserve->getIdReserve());
                $form->addField("start_time_reserve", "Start day of the lend", "date", "required", "", $work_reserve->getStartTimeReserve());
                $form->addField("dni", "DNI", "text", "required", "", $work_reserve->getDni());
                $form->addField("copy_id", "Copy ID", "text", "required", "", $work_reserve->getIdCopy());


                break;

            case 'copy':
                $work_copy=new Copy($id);
                $form->addField("isbn", "ISBN", "text", "required", "", $work_copy->getIsbn());
                $form->addField("copy_id", "Copy ID", "text", "required", "", $work_copy->getIdCopy());

                break;
        }


        $form->displayForm();

        echo "</body></html>";

        ?>

    </section>
</main>

<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>

</body>

</html>
