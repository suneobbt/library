<!DOCTYPE html>
<?php
session_cache_limiter('nocache,private');
session_start();

include('confirmIfSessionSet.php');
?>

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


    <?php include('extendedUser_section.inc') ?>

</main>

<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>

</body>

</html>
