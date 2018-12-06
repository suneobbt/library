<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 06/12/2018
 * Time: 2:30
 */

if (isset($_GET['msg'])){
switch ($_GET['msg']) {
    case 801:
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Unauthorized access.</strong> You should log in first before yo access to The Library.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php break;
    case 802:
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Wrong user or password.</strong> Please, check that you are using the correct keys.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php break;
    case 803:
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Thanks for using The Library.</strong> We hope soon you back to find new histories!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <?php break;
    case 804:
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>No copy available.</strong> We dont have any copy available of this book for the moment, sorry about that.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <?php break;
    case 805:
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> Any copy available for this date. Please choose other day.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <?php break;
    case 806:
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successful register!</strong> Dont wait more, come in to The Library and enjoy a boooook!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php break;
    case 807:
        ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Unuccessful register.</strong> Are you sure you are not registered yet? Check that your data is correct.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php break;
}}
