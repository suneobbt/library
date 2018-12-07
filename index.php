<!DOCTYPE html>
<html lang="en">

<?php require("head.php"); ?>

<main>

    <!-- Aside 1(left top) for news -->
    <aside id="ad1">
        <h2>News</h2>
        <div>Sed scelerisque gravida elementum. Morbi vitae maximus neque, et fermentum mauris. Suspendisse ut
            consectetur odio. Nulla mi mi, mattis id placerat non, semper vitae nibh. Integer sit amet iaculis ex, vitae
            ullamcorper dui. Cras eleifend leo non neque aliquet vestibulum. Cras cursus urna nec lorem varius dapibus.
            Donec a volutpat nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer convallis velit
            ligula, sed hendrerit nibh fringilla quis. n iaculis tortor quis nulla congue finibus. Curabitur egestas
            efficitur elementum. Donec auctor est dui.

        </div>
    </aside>

    <!-- Aside 2(right top) for login -->
    <aside id="ad2">
        <?php
        session_start();
        $valid_session = isset($_SESSION['session_id']) ? $_SESSION['session_id'] === session_id() : FALSE;

        if ($valid_session) {
            include('loggedInAs.inc');
        } else {
            echo "
            <form action=\"loginProcess.php\" method=\"post\">
                <h2>Login</h2>
                <label for=\"user\">User</label><br/>
                <input type=\"text\" name=\"user\" id=\"user\" placeholder=\"DNI+letter\" required=\"\"/>
                <br/>
                <label for=\"pass\">Password</label><br/>
                <input type=\"password\" name=\"pass\" id=\"pass\" required=\"\"/>
                <br/><br/>
                <input type=\"submit\" class=\"btn btn-primary\" value=\"Get in\"/>
                <br/>
                <div>You aren't a client yet? <a href=\"index.php?&register=true\">Register here</a></div>
            </form>";
        }
        ?>
    </aside>

    <section>

        <?php
        if (isset($_GET['register'])) {
            require_once("MakeForm.php");
            include_once("patterns.php");

            echo "<h2>Register your self</h2>";
            $data = new MakeForm("modifyProcess.php?ref=users&new=true&register=true", "Submit");
            $data->addField("dni", "DNI", "text", "required", PATTERN_DNI, TITLE_DNI);
            $data->addField("name", "Name", "text", "required", PATTERN_TEXT, TITLE_TEXT);
            $data->addField("surname", "Surname", "text", "required", PATTERN_TEXT, TITLE_TEXT);
            $data->addField("pass", "Password", "password", "required", PATTERN_PASSWORD, TITLE_PASSWORD);
            $data->addField("email", "E-Mail", "email", "required", PATTERN_EMAIL, TITLE_EMAIL);
            $data->addField("user_type", "", "hidden", "required", PATTERN_USER_TYPE, TITLE_USER_TYPE, "0", "readonly");
            $data->addField("phone_number", "Phone Number", "text", "", PATTERN_PHONE_NUMBER, TITLE_PHONE_NUMBER);
            $data->addField("direction", "Direction", "text", "", PATTERN_TEXT, TITLE_TEXT);
            $data->addField("city", "City", "text", "", PATTERN_TEXT, TITLE_TEXT);
            $data->addField("postal_code", "Postal Code", "text", "", PATTERN_POSTAL_CODE, TITLE_POSTAL_CODE);
            $data->addNote("<b>* To formalize your registration, on your first book lend, you must show your ID to the librarian.</b>");

            $data->displayForm();

        } else {
            ?>
            <h2>Search</h2>
            <article>
                <label for="search">Find your book</label>
                <input type="text" name="search" id="search" placeholder="ISBN, title, author..." required=""/>
                <input type="submit" class="btn btn-primary btn-sm" value="Search"/>
            </article>
            <article>
                <h3>Iaculis tortor</h3>
                In iaculis tortor quis nulla congue finibus. Curabitur egestas efficitur elementum.
            </article>
        <?php } ?>
    </section>

    <section>
        <h2>Activities</h2>
        <article>
            <h3>Lorem ipsum</h3>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ante at purus hendrerit elementum. In
                aliquet erat ac purus fermentum facilisis sed in arcu. Fusce id lacus ac dolor condimentum placerat
                vitae id nisl. Pellentesque vehicula augue in ex condimentum auctor. Duis nec est augue. Nam sed neque
                dui. Ut quis nunc pretium, dictum erat in, lobortis massa. Pellentesque auctor nisl sit amet ullamcorper
                mattis. Maecenas tristique libero eget metus mattis dignissim. Proin ut suscipit mauris, vel ornare
                nulla. Fusce id congue eros.
            </div>
        </article>
    </section>
</main>

<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>

</body>

</html>
