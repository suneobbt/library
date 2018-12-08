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
<body>
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
        require_once("ShowData.php");
        require_once("Book.php");
        require_once("Lend.php");
        require_once("Reserve.php");
        require_once("Available.php");
        require_once("Copy.php");
        //lets modify some tables

        $tableName = $_GET['ref'];
        $id = $_GET['id'];
        $superUser = false;
        $librarianPermits = false;

        if ($_SESSION['user_type'] == 2) $superUser = true;
        if ($_SESSION['user_type'] != 0) $librarianPermits = true;


        $data = new ShowData();

        $actionModify = "pageForm.php?ref=" . $tableName . "&id=" . $id;
        $actionDelete = "deleteRow('$id','$tableName','pageListed.php')";

        switch ($tableName) {
            case 'book':
                $work_book = new Book($id);
                echo "<h2>" . $work_book->getTitle() . " - " . $work_book->getAuthor() . "</h2>";
                $data->addLine("ISBN", $work_book->getIsbn());
                $data->addLine("Title", $work_book->getTitle());
                $data->addLine("Author", $work_book->getAuthor());
                $data->addLine("Editorial", $work_book->getEditorial());
                $data->addLine("Edition", $work_book->getEdition());
                $data->addLine("Year", $work_book->getYear());
                $data->addLine("Category", $work_book->getCategory());
                $data->addLine("Language", $work_book->getLanguage());
                $data->addLine("Description", $work_book->getDescription());
                $data->addLine("Book Condition", $work_book->getBookCondition());
                $data->addLine("Continuous Of", $work_book->getContinuousOf());
                $data->addLine("Continued By", $work_book->getContinuedBy());

                if ($librarianPermits) {
                    $data->addLine("Copies", Available::numberOfCopies($work_book->getIsbn()));
                    $data->addButtons($actionDelete, $actionModify);
                }

                break;

            case 'users':
                $work_user = new User($id);
                echo "<h2>" . $work_user->getName() . " - " . $work_user->getDni() . "</h2>";
                $data->addLine("DNI", $work_user->getDni());
                $data->addLine("Name", $work_user->getName());
                $data->addLine("Surname", $work_user->getSurname());
                $data->addLine("Password", $work_user->getPass());
                $data->addLine("E-Mail", $work_user->getEmail());
                if ($superUser) $data->addLine("User Type (0-Normal user, 1-Librarian, 2-Administrator)", $work_user->getUserType());
                $data->addLine("Phone Number", $work_user->getPhoneNumber());
                $data->addLine("Direction", $work_user->getDirection());
                $data->addLine("City", $work_user->getCity());
                $data->addLine("Postal Code", $work_user->getPostalCode());

                if ($librarianPermits) {
                    $data->addButtons($actionDelete, $actionModify);
                } else {
                    $actionDelete = "";
                    $data->addButtons($actionDelete, $actionModify);
                }
                break;

            case 'lend':
                $work_lend = new Lend($id);
                echo "<h2>Lend ID: " . $work_lend->getIdLend() . "</h2>";
                $work_copy = new Copy($work_lend->getIdCopy());
                $work_book = new Book($work_copy->getIsbn());
                $data->addLine("Lend ID", $work_lend->getIdLend());
                $data->addLine("ISBN", $work_copy->getIsbn());
                if ($librarianPermits) $data->addLine("Copy ID", $work_lend->getIdCopy());
                $data->addLine("Title", $work_book->getTitle());
                $data->addLine("Start day of the lend", $work_lend->getStartTimeLend());
                $date = date_add(date_create($work_lend->getStartTimeLend()), date_interval_create_from_date_string(Available::DAYSOFLEND . "days"));
                $data->addLine("End day of the lend", strval(date_format($date, "Y-m-d")));
                $data->addLine("DNI", $work_lend->getDni());


                $returnedValue = $work_lend->getReturned() === '1' ? 'true' : 'false';
                $data->addLine("Returned", $returnedValue);

                if ($librarianPermits) {
                    $actionModify = "";
                    $data->addButtons($actionDelete, $actionModify);
                }

                break;

            case 'reserve':
                $work_reserve = new Reserve($id);
                echo "<h2>Reserve ID: " . $work_reserve->getIdReserve() . "</h2>";
                $work_copy = new Copy($work_reserve->getIdCopy());
                $work_book = new Book($work_copy->getIsbn());

                $data->addLine("Reserve ID", $work_reserve->getIdReserve());
                $data->addLine("ISBN", $work_copy->getIsbn());
                if ($librarianPermits) $data->addLine("Copy ID", $work_reserve->getIdCopy());
                $data->addLine("Title", $work_book->getTitle());
                $data->addLine("Start day of the lend", $work_reserve->getStartTimeReserve());
                $date = date_add(date_create($work_reserve->getStartTimeReserve()), date_interval_create_from_date_string(Available::DAYSOFLEND . "days"));
                $data->addLine("End day of the reserve", strval(date_format($date, "Y-m-d")));
                $data->addLine("DNI", $work_reserve->getDni());


                $actionModify = "";
                $data->addButtons($actionDelete, $actionModify);
                break;

            /*case 'copy':
                $work_copy = new Copy($id);
                echo "<h2>ISBN: " . $work_copy->getIsbn() . " - Copy ID: " . $work_copy->getIdCopy() . "</h2>";
                $data->addLine("ISBN", $work_copy->getIsbn());
                $data->addLine("Copy ID", $work_copy->getIdCopy());

                break;*/
        }


        $data->displayData();


        ?>

    </section>
</main>

<?php include('footer.php') ?>

</body>

</html>
