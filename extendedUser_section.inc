<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 13:02
 */

include_once('User.php');
include_once('MakeSearchForm.php');

// $work_user=new User($_GET['sessionName']);
// $work_user created on first include in extendedUser_toolsMenu

switch ($work_user->getUserType()) {
    case 0:
        ?>
        <section>
            <article>
                <h3>Find a Book</h3>
                <?php
                $search = new MakeSearchForm("book", true);
                $search->displayForm();
                ?>
            </article>
        </section>
        <section>
            <article>
                <h3>Recomendations</h3>
                <div>
                    Duis cursus a elit non suscipit. Suspendisse augue nulla, rhoncus non ullamcorper hendrerit,
                    lacinia ac nunc. Aliquam vitae maximus erat. Vivamus quis sapien quis purus pulvinar elementum.
                    Donec non velit nibh. Aliquam pulvinar hendrerit ante. Nullam at nunc erat. Proin sed enim eget
                    mi maximus convallis. Nullam vel posuere felis. Sed ac sollicitudin odio. Nullam elementum vulputate
                    scelerisque.
                </div>
                <div>
                    Nullam lobortis felis vitae orci placerat ullamcorper. Mauris accumsan elit lorem, non finibus enim
                    molestie vel. Proin finibus justo a tincidunt congue. Proin sit amet orci non neque posuere euismod
                    non in augue. Donec sodales maximus tellus id accumsan. Nunc sit amet tristique ante. Duis
                    vestibulum lectus et rutrum venenatis.
                </div>
                <div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat libero sed lorem ultricies
                    varius.Sed enim ex, finibus ac dolor sit amet, condimentum ullamcorper diam. Nam cursus neque eget
                    mauris tincidunt accumsan. Aliquam ac augue ligula. Vestibulum scelerisque mollis metus, at
                    vulputate risus dictum et. Suspendisse commodo urna at lacinia pharetra.
                </div>
            </article>
        </section>
        <?php
        break;
    //end case 0

    case 1:
        ?>
        <section>
            <article>
                <h3>Return Book</h3>
                <?php
                $search = new MakeSearchForm("lend", false);
                    $search->displayForm();
                ?>
            </article>
        </section>
        <section>
            <article>
                <h3>Pick Up Book</h3>
                <?php
                $search = new MakeSearchForm("reserve", false);
                $search->displayForm();
                ?>
            </article>
        </section>

        <section>
            <article>
                <h3>Find a Book</h3>

                <?php
                $search = new MakeSearchForm("book", true);
                $search->displayForm();
                ?>
            </article>
        </section>
        <section>
            <article>
                <h3>Extra information for Librarian</h3>
                <div>
                    Duis cursus a elit non suscipit. Suspendisse augue nulla, rhoncus non ullamcorper hendrerit,
                    lacinia ac nunc. Aliquam vitae maximus erat. Vivamus quis sapien quis purus pulvinar elementum.
                    Donec non velit nibh. Aliquam pulvinar hendrerit ante. Nullam at nunc erat. Proin sed enim eget
                    mi maximus convallis. Nullam vel posuere felis. Sed ac sollicitudin odio. Nullam elementum vulputate
                    scelerisque.
                </div>
                <div>
                    Nullam lobortis felis vitae orci placerat ullamcorper. Mauris accumsan elit lorem, non finibus enim
                    molestie vel. Proin finibus justo a tincidunt congue. Proin sit amet orci non neque posuere euismod
                    non in augue. Donec sodales maximus tellus id accumsan. Nunc sit amet tristique ante. Duis
                    vestibulum lectus et rutrum venenatis.
                </div>
            </article>
        </section>
        <?php
        break;
    //end case 1

    case 2:
        ?>
        <section>
            <article>
                <h3>Find a user</h3>
                <?php
                $search = new MakeSearchForm("users", true);
                $search->displayForm();
                ?>
            </article>
        </section>
        <section>
            <article>
                <h3>Find a Book</h3>
                <?php
                $search = new MakeSearchForm("book", true);
                $search->displayForm();
                ?>
            </article>
        </section>
        <section>
            <article>
                <h3>Extra information for administrator</h3>
                <div>
                    Duis cursus a elit non suscipit. Suspendisse augue nulla, rhoncus non ullamcorper hendrerit,
                    lacinia ac nunc. Aliquam vitae maximus erat. Vivamus quis sapien quis purus pulvinar elementum.
                    Donec non velit nibh. Aliquam pulvinar hendrerit ante. Nullam at nunc erat. Proin sed enim eget
                    mi maximus convallis. Nullam vel posuere felis. Sed ac sollicitudin odio. Nullam elementum vulputate
                    scelerisque.
                </div>
                <div>
                    Nullam lobortis felis vitae orci placerat ullamcorper. Mauris accumsan elit lorem, non finibus enim
                    molestie vel. Proin finibus justo a tincidunt congue. Proin sit amet orci non neque posuere euismod
                    non in augue. Donec sodales maximus tellus id accumsan. Nunc sit amet tristique ante. Duis
                    vestibulum lectus et rutrum venenatis.
                </div>
            </article>
        </section>
        <?php
        break;
    //end case 2
}
