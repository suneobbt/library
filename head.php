<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 06/12/2018
 * Time: 3:24
 */

include_once ("constants.php");
?>

<head>
    <title>The Library</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script type="text/javascript" src="functionsJS.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <span id="headerTitle"><a href="index.php">The Library</a>&nbsp
    </span><span id="headerSubtitle"> Where knowledge occupies place</span>
</header>

<nav>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pageUser.php">User Page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" title="Coming soon">Help</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" title="Coming soon">Contact</a>
        </li>
    </ul>
    <?php include "alertsMsg.php"; ?>
</nav>
