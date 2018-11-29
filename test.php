<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 25/11/2018
 * Time: 19:29
 */

include ("Available.php");



echo "copylend: ".  Available::copyLend("4","");

//echo Available::copyAvailable("4","2018/11/22");

echo Available::bookAvailable("9788445000663","2018/12/01");
