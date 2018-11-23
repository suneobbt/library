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
    <title>The Library - Form </title>
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
        $superUser=false;
        if ($_GET['id']!=0) $superUser=true;


        $data = new MakeForm("modifyProcess.php?ref=" . $tableName, "Modify " . $tableName);

        switch ($tableName) {
            case 'book':
                $work_book = new Book($id);
                $data->addField("isbn", "ISBN", "text", "required", "", $work_book->getIsbn());
                $data->addField("title", "Title", "text", "", "required", $work_book->getTitle());
                $data->addField("author", "Author", "text", "", "required", $work_book->getAuthor());
                $data->addField("editorial", "Editorial", "text", "required", "", $work_book->getEditorial());
                $data->addField("edition", "Edition", "text", "", "", $work_book->getEdition());
                $data->addField("year", "Year", "text", "required", "", $work_book->getYear());
                $data->addField("category", "Category", "text", "", "", $work_book->getCategory());
                $data->addField("language", "Language", "text", "required", "", $work_book->getLanguage());
                $data->addField("description", "Description", "text", "", "", $work_book->getDescription());
                $data->addField("book_condition", "Book Condition", "text", "", "", $work_book->getBookCondition());
                $data->addField("continuous_of", "Continuous Of", "text", "", "", $work_book->getContinuousOf());
                $data->addField("continued_by", "Continued By", "text", "", "", $work_book->getContinuedBy());
                break;

            case 'users':
                $work_user = new User($id);
                $data->addField("dni", "DNI", "text", "required", "", $work_user->getDni());
                $data->addField("name", "Name", "text", "required", "", $work_user->getName());
                $data->addField("surname", "Surname", "text", "required", "", $work_user->getSurname());
                $data->addField("pass", "Password", "password", "required", "", $work_user->getPass());
                $data->addField("email", "E-Mail", "email", "required", "", $work_user->getEmail());
                if ($superUser) $data->addField("user_type", "User Type (0-Normal user, 1-Librarian, 2-Administrator)", "text", "required", "", $work_user->getUserType());
                $data->addField("phone_number", "Phone Number", "text", "required", "", $work_user->getPhoneNumber());
                $data->addField("direction", "Direction", "text", "", "", $work_user->getDirection());
                $data->addField("city", "City", "text", "", "", $work_user->getCity());
                $data->addField("postal_code", "Postal Code", "text", "", "", $work_user->getPostalCode());
                break;

            case 'lend':
                $work_lend = new Lend($id);
                $data->addField("lend_id", "Lend ID", "text", "required", "", $work_lend->getIdLend());
                $data->addField("start_time_lend", "Start day of the lend", "date", "required", "", $work_lend->getStartTimeLend());
                $data->addField("dni", "DNI", "text", "required", "", $work_lend->getDni());
                $data->addField("copy_id", "Copy ID", "text", "required", "", $work_lend->getIdCopy());


                break;

            case 'reserve':
                $work_reserve = new Reserve($id);
                $data->addField("id_reserve", "Reserve ID*", "text", "required", "readonly", $work_reserve->getIdReserve());
                $data->addField("start_time_reserve", "Start day of the lend", "date", "required", "", $work_reserve->getStartTimeReserve());
                $data->addField("dni", "DNI*", "text", "required", "readonly", $work_reserve->getDni());
                $data->addField("id_copy", "Copy ID*", "text", "required", "readonly", $work_reserve->getIdCopy());
                $data->addNote("* If you change this values, is like make a new reserve. For it, delete the reserve and create a new one.");
                break;

            case 'copy':
                $work_copy = new Copy($id);
                $data->addField("isbn", "ISBN", "text", "required", "", $work_copy->getIsbn());
                $data->addField("copy_id", "Copy ID", "text", "required", "", $work_copy->getIdCopy());

                break;
        }


        $data->displayForm();


        ?>

    </section>
</main>

<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>

</body>

</html>
