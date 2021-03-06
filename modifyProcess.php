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
$register = false;
if (isset($_GET['new'])) $new = $_GET['new'] === 'true' ? true : false;
if (isset($_GET['id'])) $id = $_GET['id'];
if (isset($_GET['register'])) $register = true;

switch ($tableName) {
    case 'book':
        $work_book = new Book ($_POST["isbn"], $_POST["title"], $_POST["author"], $_POST["editorial"],
            $_POST["edition"], $_POST["year"], $_POST["category"], $_POST["language"], $_POST["description"],
            $_POST["book_condition"], $_POST["continuous_of"], $_POST["continued_by"]);

        if ($new) {
            $work_book->insertBookToBD($_POST["copies"]);
        } else {
            $work_book->updateBookOfBD($_POST["copies"]);
        }

        break;

    case 'users':
        $work_user = new User($_POST["dni"], $_POST["name"], $_POST["surname"], $_POST["pass"], $_POST["user_type"],
            $_POST["phone_number"], $_POST["city"], $_POST["postal_code"], $_POST["email"], $_POST["direction"]);

        if ($new) {
            $work_user->insertUserToBD($register);
        } else {
            $work_user->updateUserOfBD();
        }

        break;

    case 'lend':
        $work_lend = new Lend ("", "", $_POST["dni"], "", false);

        if ($new) {
            $work_lend->insertLendToBD($_POST["isbn"]);
        } else {
            $work_lend->updateLendOfBD();
        }

        break;

    case 'return':
        $work_lend = new Lend ($id);
        $work_lend->setReturned(1);

        $work_lend->updateLendOfBD();

        break;

    case 'reserve':
        $work_reserve = new Reserve ("", $_POST["start_time_reserve"], $_POST["dni"], "");

        if ($new) {
            $work_reserve->insertReserveToBD($_POST["isbn"]);
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