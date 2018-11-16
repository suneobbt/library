<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 15/11/2018
 * Time: 20:38
 */

session_cache_limiter ('nocache,private');
session_start();

include ('confirmIfSessionSet.php');

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
        <?php include('extendedUser_toolsMenu.inc');?>
    </aside>

    <!-- Aside 2(right top) for login -->
    <aside id="ad2">
        <?php include ('loggedInAs.inc') ?>
    </aside>

    <section>

        <?php
        require_once("MakeForm.php");


        


        $form = new MakeForm("process.php","Submit Phone");

        $form->addField("first_name","First Name","text");
        $form->addField("last_name" ,"Last Name","text","disabled","","");
        $form->addField("phone","Phone","text");
        $form->addField("phone","Phone","text");
        $form->addField("phone","Phone","text");
        $form->addField("phone","Phone","text");

        $form->displayForm();

        echo "</body></html>";

        ?>

    </section>
</main>

<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>

</body>

</html>
