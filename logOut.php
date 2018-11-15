<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 15/11/2018
 * Time: 17:29
 */

@session_start();
session_destroy();
header("Location: index.php?msg=803");