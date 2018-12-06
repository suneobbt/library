<?php
session_cache_limiter('nocache,private');
session_start();

include('confirmIfSessionSet.php');

if (isset($_GET['id'])) {
    include('delete.php');
}
?>

<!DOCTYPE html>

<html lang="en">
<?php require("head.php"); ?>

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
        include_once('MakeTable.php');

        // variables to create a MakeTable object
        $dbName = "library";
        $tableName = $_GET['ref'];
        $condition = $_SESSION['user_id'];
        $fieldCondition = "";

        //list search values
        $condition2 = "";
        if (isset($_POST['patternSearch'])) $condition2 = $_POST['fieldSearch'] . " LIKE '%" . $_POST['patternSearch'] . "%'";


        $adminUser = false;
        if ($_SESSION['user_type'] == 2) $adminUser = true;

        // files where to jump to Browse, Edit and Delete the selected row.
        $fileBrowse = "pageBrowse.php";
        $fileUpdate = "";
        $fileDelete = "";
        $filePickUp = "";
        $fileReturn = "";

        if ($_SESSION['user_type'] != '0') {
            $fileUpdate = "pageForm.php";
            $fileDelete = "pageListed.php";
        }

        switch ($tableName) {
            case "lend":
                if ($_SESSION['user_type'] != '0') {
                    ?>

                    <h3>Find a lend</h3>
                    <form method="post" action="pageListed.php?ref=lend">
                        <label for="patternSearch">Search:</label>
                        <input type="text" name="patternSearch" id="patternSearch" required=""/>

                        <label for="fieldSearch">Search by: </label>
                        <select id="fieldSearch" name="fieldSearch" required="">
                            <option value="isbn" selected="selected">ISBN</option>
                            <option value="dni">DNI</option>
                        </select>
                        <input type="submit" value="Search"/>
                    </form>
                    <br/>

                    <?php
                }
                $fields = array("id_lend", "dni", "start_time_lend");
                if ($condition2 != "") $condition2 = " JOIN `copy` ON copy.id_copy=lend.id_copy WHERE " . $condition2;

                if ($_SESSION['user_type'] != '0') {
                    $fields[] = "lend.id_copy";
                    $fileReturn = "modifyProcess.php";
                    $fileUpdate = "";
                } else {
                    //add condition to show only her lends
                    $fieldCondition = "dni";
                }
                break;

            case "reserve":
                if ($_SESSION['user_type'] != '0') {
                    ?>

                    <h3>Find a reserve</h3>
                    <form method="post" action="pageListed.php?ref=reserve">
                        <label for="patternSearch">Search:</label>
                        <input type="text" name="patternSearch" id="patternSearch" required=""/>

                        <label for="fieldSearch">Search by: </label>
                        <select id="fieldSearch" name="fieldSearch" required="">
                            <option value="isbn" selected="selected">ISBN</option>
                            <option value="dni">DNI</option>
                        </select>
                        <input type="submit" value="Search"/>
                    </form>
                    <br/>

                    <?php
                }
                $fields = array("id_reserve", "dni", "start_time_reserve");
                if ($condition2 != "") $condition2 = " JOIN `copy` ON copy.id_copy=reserve.id_copy WHERE " . $condition2;

                if ($_SESSION['user_type'] != '0') {
                    $fields[] = "reserve.id_copy";
                    $filePickUp = "pageForm.php";
                    $fileUpdate = "";
                } else {
                    //add condition to show only her reserves
                    $fieldCondition = "dni";
                }
                break;

            case "book": ?>

                <h3>Find a book</h3>
                <form method="post" action="pageListed.php?ref=book">
                    <label for="patternSearch">Search:</label>
                    <input type="text" name="patternSearch" id="patternSearch" required=""/>

                    <label for="fieldSearch">Search by: </label>
                    <select id="fieldSearch" name="fieldSearch" required="">
                        <option value="isbn" selected="selected">ISBN</option>
                        <option value="title">Title</option>
                        <option value="author">Author</option>
                        <option value="editorial">Editorial</option>
                        <option value="year">Year</option>
                        <option value="category">Category</option>
                        <option value="language">Language</option>
                    </select>
                    <input type="submit" value="Search"/>
                </form>
                <br/>

                <?php $fields = array("isbn", "title", "author", "year");
                if ($condition2 != "") $condition2 = " WHERE " . $condition2;

                break;

            case "users": ?>

                <h3>Find a user</h3>
                <form method="post" action="pageListed.php?ref=users">
                    <label for="patternSearch">Search: </label>
                    <input type="text" name="patternSearch" id="patternSearch" placeholder="" required=""/>
                    <label for="fieldSearch">Search by: </label>
                    <select id="fieldSearch" name="fieldSearch" required="">
                        <option value="dni" selected="selected">DNI</option>
                        <option value="name">Name</option>
                        <option value="surname">Surname</option>
                        <option value="email">E-Mail</option>
                        <option value="phone_number">Phone number</option>
                        <option value="postal_code">Postal code</option>
                        <option value="city">City</option>
                    </select>
                    <input type="submit" value="Search"/>
                </form>
                <br/>

                <?php $fields = array("dni", "name", "surname", "user_type");
                if ($condition2 != "" && !$adminUser) $condition2 = " AND " . $condition2;
                if ($condition2 != "" && $adminUser) $condition2 = " WHERE " . $condition2;


                if (!$adminUser) {
                    $fieldCondition = "user_type";
                    $condition = "0";
                }
                break;
        }

        $t = new MakeTable($dbName, $tableName, $fields, $fileBrowse,
            $fileUpdate, $fileDelete, $condition, $fieldCondition, $condition2, $filePickUp, $fileReturn);

        $t->paintTable();

        ?>

    </section>
</main>

<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>

</body>

</html>
