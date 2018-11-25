<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 16/11/2018
 * Time: 2:51
 */
require_once('Book.php');
require_once('User.php');
require_once('Reserve.php');
require_once('Lend.php');
require_once('Copy.php');


$tableName = $_GET['ref'];
$new = $_GET['new'] === 'true'? true: false;


switch ($tableName) {
    case 'book':
        $work_book = new Book ($_POST["isbn"], $_POST["title"], $_POST["author"], $_POST["editorial"],
            $_POST["edition"], $_POST["year"], $_POST["category"], $_POST["language"], $_POST["description"],
            $_POST["book_condition"], $_POST["continuous_of"], $_POST["continued_by"]);

        if ($new) {
            $work_book->insertBookToBD();
        } else {
            $work_book->updateBookOfBD();
        }

        break;

    case 'users':
        $work_user = new User($_POST["dni"], $_POST["name"], $_POST["surname"], $_POST["pass"], $_POST["user_type"],
            $_POST["phone_number"], $_POST["city"], $_POST["postal_code"], $_POST["email"], $_POST["direction"]);

        if ($new) {
            $work_user->insertUserToBD();
        } else {
            $work_user->updateUserOfBD();
        }

        break;

    case 'lend':
        $work_lend = new Lend ($_POST["id_lend"], $_POST["start_time_lend"], $_POST["dni"], $_POST["id_copy"],$_POST['returned']);

        if ($new) {
            $work_lend->insertLendToBD();
        } else {
            $work_lend->updateLendOfBD();
        }

        break;

    case 'reserve':
        $work_reserve = new Reserve ($_POST["id_reserve"], $_POST["start_time_reserve"], $_POST["dni"], $_POST["id_copy"]);

        if ($new) {
            $work_reserve->insertReserveToBD();
        } else {
            $work_reserve->updateReserveOfBD();
        }

        break;

    case 'copy':
        $work_copy = new Copy ($_POST["id_copy"], $_POST["isbn"]);

        if ($new) {
            $work_copy->insertCopyToBD();
        } else {
            $work_copy->updateCopyOfBD();
        }

        break;
}