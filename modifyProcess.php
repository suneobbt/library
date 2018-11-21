<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 16/11/2018
 * Time: 2:51
 */
require_once ('Book.php');

//TODO: Implement code to get the results from pageForm modify and transport it to the BD
$tableName = $_GET['ref'];


switch ($tableName) {
    case 'book':
        $work_book = new Book ($_POST["isbn"], $_POST["title"], $_POST["author"],  $_POST["editorial"],  $_POST["edition"],  $_POST["year"],  $_POST["category"], $_POST["language"], $_POST["description"], $_POST["book_condition"], $_POST["continuous_of"], $_POST["continued_by"]);
        $work_book->updateBookOfBD();
        break;

    case 'users':
        break;

    case 'lend':
        break;

    case 'reserve':
        break;

    case 'copy':
        break;
}