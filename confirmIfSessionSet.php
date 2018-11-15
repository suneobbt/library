<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 15/11/2018
 * Time: 17:48
 */

$valid_session = isset($_SESSION['session_id']) ? $_SESSION['session_id'] === session_id() : FALSE;

if (!$valid_session) {
    header ("Location:http://localhost/library/index.php?msg=801");

}
