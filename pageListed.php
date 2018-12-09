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
<body>
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
        include_once('MakeSearchForm.php');

        // variables to create a MakeTable object
        $dbName = "library";
        $tableName = $_GET['ref'];
        $condition = $_SESSION['user_id'];
        $fieldCondition = "";

        //list search values
        $condition2 = "";
        if (isset($_POST['patternSearch'])) $condition2 = $_POST['fieldSearch'] . " LIKE '%" . $_POST['patternSearch'] . "%'";

        $superUser = false;
        if ($_SESSION['user_type'] == USER_TYPE_ADMIN) $superUser = true;

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

                if ($_SESSION['user_type'] != USER_TYPE_USER) {
                    echo "<h3>Find a lend</h3>";
                    $search = new MakeSearchForm("lend", true);
                    $search->displayForm();
                    echo "<br/>";
                }
                $fields = array("id_lend", "dni", "start_time_lend","returned");
                if ($condition2 != "") $condition2 = " JOIN `copy` ON copy.id_copy=lend.id_copy WHERE " . $condition2;

                if ($_SESSION['user_type'] != '0') {
                    $fields[] = "lend.id_copy";
                    $fileReturn = "modifyProcess.php";
                    $fileUpdate = "";
                } else {
                    //add condition to show only her lends
                    $fieldCondition = "dni";
                }

                echo "<h3>Lends</h3>";
                break;

            case "reserve":
                if ($_SESSION['user_type'] != USER_TYPE_USER) {
                    echo "<h3>Find a reserve</h3>";
                    $search = new MakeSearchForm("reserve", true);
                    $search->displayForm();
                    echo "<br/>";
                }
                $fields = array("id_reserve", "dni", "start_time_reserve");
                if ($condition2 != "") $condition2 = " JOIN `copy` ON copy.id_copy=reserve.id_copy WHERE " . $condition2;

                if ($_SESSION['user_type'] != USER_TYPE_USER) {
                    $fields[] = "reserve.id_copy";
                    $filePickUp = "pageForm.php";
                    $fileUpdate = "";
                } else {
                    //add condition to show only her reserves
                    $fieldCondition = "dni";
                }
                echo "<h3>Reserves</h3>";
                break;

            case "book":
                echo "<h3>Find a book</h3>";
                $search = new MakeSearchForm("book", true);
                $search->displayForm();
                echo "<br/>";

                $fields = array("isbn", "title", "author", "year");
                if ($condition2 != "") $condition2 = " WHERE " . $condition2;
                echo "<h3>Books</h3>";
                break;

            case "users":

                echo "<h3>Find a user</h3>";
                $search = new MakeSearchForm("book", true);
                $search->displayForm();
                echo "<br/>";

                $fields = array("dni", "name", "surname", "user_type");
                if ($condition2 != "" && !$superUser) $condition2 = " AND " . $condition2;
                if ($condition2 != "" && $superUser) $condition2 = " WHERE " . $condition2;

                if (!$superUser) {
                    $fieldCondition = "user_type";
                    $condition = USER_TYPE_USER;
                }
                echo "<h3>Users</h3>";
                break;
        }

        $t = new MakeTable($dbName, $tableName, $fields, $fileBrowse,
            $fileUpdate, $fileDelete, $condition, $fieldCondition, $condition2, $filePickUp, $fileReturn);

        $t->paintTable();

        ?>

    </section>

    <?php if ($_SESSION['user_type'] == USER_TYPE_USER) { ?>
        <section>
            <h2>Information about <?php echo $tableName?></h2>
            <article>
                <div> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis lorem, faucibus eget
                    aliquet quis, finibus id dolor. Aenean condimentum ut turpis non finibus. Ut ac odio nec massa
                    condimentum aliquet. Quisque eu feugiat est, ac consectetur justo. Pellentesque id porta lectus.
                    Nulla ac sem ac enim maximus ultricies ac vel diam. Ut pretium sagittis consequat. In hac
                    habitasse platea dictumst. Cras sed efficitur augue, a elementum mi. Donec facilisis vel quam
                    porta hendrerit. Morbi vehicula maximus est, aliquam iaculis nunc fringilla sed. Praesent sed
                    suscipit risus, non gravida eros.
                </div>
                <div>
                    Proin mi tortor, tempor a dictum ac, tempus ut tellus. In a nisi sed ante rhoncus tincidunt.
                    Vestibulum non massa sapien. Etiam blandit tincidunt ligula at maximus. Mauris ac lobortis lacus.
                    Aliquam erat volutpat. Mauris ac iaculis libero. Aliquam tincidunt magna urna, vel tristique nibh
                    dapibus vitae. Quisque efficitur eleifend pulvinar. Nullam vel congue lacus, vel dapibus mi.
                </div>
            </article>
        </section>
    <?php } ?>
</main>

<?php include('footer.php') ?>

</body>

</html>
