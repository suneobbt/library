<?php
session_start();
?>

<!DOCTYPE html>


<html>

<head>
    <title>The Library - Listed </title>
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
        <p>aside</p>
    </aside>

    <!-- Aside 2(right top) for login -->
    <aside id="ad2">
        login
    </aside>

    <section>

        <?php
        include_once('MakeTable.php');

        // variables to create a MakeTable object
        $dbName = "library";
        $tableName = $_GET['ref'];

        // files where to jump to Browse, Edit and Delete the selected row.
        $fileBrowse = "browse.php";
        $fileUpdate = "";
        $fileDelete = "";

        if ($_SESSION['user_type'] != '0') {
            $fileUpdate = "edit.php";
            $fileDelete = "delete.php";
        }

        // name of fields to be shown
        switch ($tableName) {
            case "lend":
                $fields = array("id_lend", "dni", "start_time_lend");
                if ($_SESSION['user_type'] != '0'){
                    $fields[]="id_copy";
                }
                break;
            case "reserve":
                $fields = array("id_reserve", "dni", "start_time_reserve");
                if ($_SESSION['user_type'] != '0'){
                    $fields[]="id_copy";
                }
                break;
            case "book":
                $fields = array("isbn","title","author","editorial","year","language","book_condition");
                break;
            case "users":
                $fields = array("dni","name","surname","user_type");
                break;
        }

        $t = new MakeTable($dbName, $tableName, $fields, $fileBrowse,
            $fileUpdate, $fileDelete);
        $t->paintTable();

        ?>

    </section>
</main>

<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>

</body>

</html>
