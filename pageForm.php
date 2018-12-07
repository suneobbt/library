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
<html lang="en">

<?php require("head.php"); ?>

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
        require_once("Available.php");
        include_once("patterns.php");
        //lets modify some tables

        $tableName = $_GET['ref'];
        $id = $_GET['id'];
        $superUser = false;

        if (isset($_SESSION['user_type'])) {
            if ($_SESSION['user_type'] > 1) $superUser = true;
        }

        if ($id == "new") {
            $data = new MakeForm("modifyProcess.php?ref=" . $tableName . "&new=true", "Insert new " . $tableName);
            echo "<h2>Insert new " . $tableName . "</h2>";
            switch ($tableName) {
                case 'book':
                    $data->addField("isbn", "ISBN", "text", "required", PATTERN_ISBN, TITLE_ISBN);
                    $data->addField("title", "Title", "text", "required", PATTERN_TEXT, TITLE_TEXT);
                    $data->addField("author", "Author", "text", "required", PATTERN_TEXT, TITLE_TEXT);
                    $data->addField("editorial", "Editorial", "text", "required", PATTERN_TEXT, TITLE_TEXT);
                    $data->addField("edition", "Edition", "text", "", PATTERN_EDITION, TITLE_EDITION);
                    $data->addField("year", "Year", "text", "required", PATTERN_YEAR, TITLE_YEAR);
                    $data->addField("category", "Category", "text", "", PATTERN_TEXT, TITLE_TEXT);
                    $data->addField("language", "Language", "text", "required", PATTERN_TEXT, TITLE_TEXT);
                    $data->addField("description", "Description", "text", "", PATTERN_DESCRIPTION, TITLE_DESCRIPTION);
                    $data->addField("book_condition", "Book Condition", "text", "", PATTERN_CONDITION, TITLE_CONDITION);
                    $data->addField("continuous_of", "Continuous Of", "text", "", PATTERN_ISBN, TITLE_ISBN);
                    $data->addField("continued_by", "Continued By", "text", "", PATTERN_ISBN, TITLE_ISBN);
                    $data->addField("copies", "Number of copies", "number", "min=1 required");

                    break;

                case 'users':
                    $data->addField("dni", "DNI", "text", "required", PATTERN_DNI, TITLE_DNI);
                    $data->addField("name", "Name", "text", "required", PATTERN_TEXT, TITLE_TEXT);
                    $data->addField("surname", "Surname", "text", "required", PATTERN_TEXT, TITLE_TEXT);
                    $data->addField("pass", "Password", "password", "required", PATTERN_PASSWORD, TITLE_PASSWORD);
                    $data->addField("email", "E-Mail", "email", "required");

                    if ($superUser) {
                        $data->addField("user_type", "User Type (0-Normal user, 1-Librarian, 2-Administrator)", "text", "required", PATTERN_USER_TYPE, TITLE_USER_TYPE);
                    } else {
                        $data->addField("user_type", "User Type (0-Normal user, 1-Librarian, 2-Administrator)", "text", "required", PATTERN_USER_TYPE, TITLE_USER_TYPE, "0", "readonly");
                    }

                    $data->addField("phone_number", "Phone Number", "text", "", PATTERN_PHONE_NUMBER, TITLE_PHONE_NUMBER);
                    $data->addField("direction", "Direction", "text", "", PATTERN_TEXT, TITLE_TEXT);
                    $data->addField("city", "City", "text", "", PATTERN_TEXT, TITLE_TEXT);
                    $data->addField("postal_code", "Postal Code", "text", PATTERN_POSTAL_CODE, TITLE_POSTAL_CODE);
                    break;

                case 'lend':
                    $dniLend = "";
                    $isbnLend = "";

                    if (isset($_COOKIE['dniLend'])) {
                        $dniLend = $_COOKIE['dniLend'];
                        $isbnLend = $_COOKIE['isbnLend'];
                    }

                    if (isset($_GET['dniLend'])) {
                        $dniLend = $_GET['dniLend'];
                        $isbnLend = $_GET['isbnLend'];
                    }

                    $data->addField("dni", "DNI", "text", "required", PATTERN_DNI, TITLE_DNI, $dniLend);
                    $data->addField("isbn", "ISBN", "text", "required", PATTERN_ISBN, TITLE_ISBN, $isbnLend);

                    break;

                case 'reserve':
                    $dateReserve = "";
                    $dniReserve = "";
                    $isbnReserve = "";

                    if (isset($_COOKIE['dateReserve'])) {
                        $dateReserve = $_COOKIE['dateReserve'];
                        $dniReserve = $_COOKIE['dniReserve'];
                        $isbnReserve = $_COOKIE['isbnReserve'];
                    }
                    // $data->addField("id_reserve", "Reserve ID", "text", "required", "disabled", "", "");
                    $data->addField("start_time_reserve", "Start day of the reserve", "date", "required", "", "", $dateReserve);
                    $data->addField("dni", "DNI", "text", "required", PATTERN_DNI, TITLE_DNI, $dniReserve);
                    $data->addField("isbn", "ISBN", "text", "required", PATTERN_ISBN, TITLE_ISBN, $isbnReserve);
                    break;

            }
        } else {
            $data = new MakeForm("modifyProcess.php?ref=" . $tableName . "&new=false", "Modify " . $tableName);

            switch ($tableName) {
                case 'book':
                    $work_book = new Book($id);
                    $data->addField("isbn", "ISBN", "text", "required", "", $work_book->getIsbn(), "");
                    $data->addField("title", "Title", "text", "", "required", $work_book->getTitle(), "");
                    $data->addField("author", "Author", "text", "", "required", $work_book->getAuthor(), "");
                    $data->addField("editorial", "Editorial", "text", "required", "", $work_book->getEditorial(), "");
                    $data->addField("edition", "Edition", "text", "", "", $work_book->getEdition(), "");
                    $data->addField("year", "Year", "text", "required", "", $work_book->getYear(), "");
                    $data->addField("category", "Category", "text", "", "", $work_book->getCategory(), "");
                    $data->addField("language", "Language", "text", "required", "", $work_book->getLanguage(), "");
                    $data->addField("description", "Description", "text", "", "", $work_book->getDescription(), "");
                    $data->addField("book_condition", "Book Condition", "text", "", "", $work_book->getBookCondition(), "");
                    $data->addField("continuous_of", "Continuous Of", "text", "", "", $work_book->getContinuousOf(), "");
                    $data->addField("continued_by", "Continued By", "text", "", "", $work_book->getContinuedBy(), "");
                    $data->addField("copies", "Number of copies", "number", "required", "", Available::numberOfCopies($work_book->getIsbn()), "");
                    break;

                case 'users':
                    $work_user = new User($id);
                    $data->addField("dni", "DNI", "text", "required", "readonly", $work_user->getDni(), "");
                    $data->addField("name", "Name", "text", "required", "", $work_user->getName(), "");
                    $data->addField("surname", "Surname", "text", "required", "", $work_user->getSurname(), "");
                    $data->addField("pass", "Password", "password", "required", "", $work_user->getPass(), "");
                    $data->addField("email", "E-Mail", "email", "required", "", $work_user->getEmail(), "");
                    if ($superUser) {
                        $data->addField("user_type", "User Type (0-Normal user, 1-Librarian, 2-Administrator)", "text", "required", "", $work_user->getUserType(), "");
                    } else {
                        $data->addField("user_type", "User Type (0-Normal user, 1-Librarian, 2-Administrator)", "text", "required", "readonly", $work_user->getUserType(), "");
                    }
                    $data->addField("phone_number", "Phone Number", "text", "", "", $work_user->getPhoneNumber(), "");
                    $data->addField("direction", "Direction", "text", "", "", $work_user->getDirection(), "");
                    $data->addField("city", "City", "text", "", "", $work_user->getCity(), "");
                    $data->addField("postal_code", "Postal Code", "text", "", "", $work_user->getPostalCode(), "");
                    break;

                case 'lend':
                    $work_lend = new Lend($id);
                    $data->addField("id_lend", "Lend ID", "text", "required", "readonly", $work_lend->getIdLend(), "");
                    $data->addField("start_time_lend", "Start day of the lend", "date", "required", "", $work_lend->getStartTimeLend(), "");
                    $data->addField("dni", "DNI", "text", "required", "readonly", $work_lend->getDni(), "");
                    $data->addField("id_copy", "Copy ID", "text", "required", "readonly", $work_lend->getIdCopy(), "");
                    $returnedValue = $work_lend->getReturned() === '1' ? 'true' : 'false';
                    $data->addField("returned", "Returned", "text", "required", "", $returnedValue, "");
                    //$data->addNote("If you change this values, is like make a new lend. For it, delete the lend and create a new one.");

                    break;

                case 'reserve':
                    $work_reserve = new Reserve($id);
                    $data->addField("id_reserve", "Reserve ID", "text", "required", "readonly", $work_reserve->getIdReserve(), "");
                    $data->addField("start_time_reserve", "Start day of the lend", "date", "required", "", $work_reserve->getStartTimeReserve(), "");
                    $data->addField("dni", "DNI", "text", "required", "readonly", $work_reserve->getDni(), "");
                    $data->addField("id_copy", "Copy ID", "text", "required", "readonly", $work_reserve->getIdCopy(), "");
                    //$data->addNote("If you change this values, is like make a new reserve. For it, delete the reserve and create a new one.");
                    break;

            }
        }

        $data->displayForm();


        ?>

    </section>
</main>

<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>

</body>

</html>
