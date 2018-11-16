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
        //lets modify some tables

        $tableName = $_GET['ref'];
        $id = $_GET['id'];

        $form = new MakeForm("modifyProcess.php?ref=".$tableName, "Modify ".$tableName);
        //TODO: Implement form creator
        switch ($tableName) {
            case 'book':

                $work_book=new Book($id);
                $form->addField("isbn","ISBN","text","",$work_book->getIsbn(),"");
                $form->addField();

                break;

            case 'users':
                $work_user=new Book($id);
                $form->addField();

                break;

            case 'lend':
                $work_lend=new Book($id);
                $form->addField();

                break;

            case 'reserve':
                $work_reserve=new Book($id);
                $form->addField();

                break;

            case 'copy':
                $work_copy=new Book($id);
                $form->addField();

                break;
        }



        $form->displayForm();

        echo "</body></html>";

        ?>

    </section>
</main>

<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>

</body>

</html>
