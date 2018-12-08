<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 12:23
 */

include_once('User.php');
include_once('constants.php');

$work_user = new User($_SESSION['user_id']);
// $work_user created on first include in extendedUser_toolsMenu

?>
<div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->
    <div class="d-flex justify-content-center">
        <img id="profileImg" src="res/users/pred_user.png" alt="User picture">
    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div>
        <div class="d-flex justify-content-center">
            <?php echo "<h5>".$work_user->getName() . " " . $work_user->getSurname()."</h5>"?>
        </div>
        <div class="d-flex justify-content-center">
            <?php
            switch ($work_user->getUserType()){
                case USER_TYPE_USER:
                    echo"User";
                    break;
                case USER_TYPE_LIBRARIAN:
                    echo "Librarian";
                    break;
                case USER_TYPE_ADMIN:
                    echo"Administrator";
                    break;
            }
            ?>
        </div>
    </div>
    <br/>
    <!-- END SIDEBAR USER TITLE -->
    <!-- SIDEBAR BUTTONS -->
    <div class="d-flex justify-content-center">
        <br/>
        <?php echo "<a class=\"btn btn-info\" href=\"pageBrowse.php?id=" . $_SESSION['user_id'] . "&ref=users\">My data</a>";?>
        &nbsp&nbsp<a href="logOut.php" class="btn btn-outline-danger">Log out</a>
    </div>
    <!-- END SIDEBAR BUTTONS -->
</div>


