<!DOCTYPE html>
<html>

<head>
    <title>The Library</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
<header>
    <h1>The Library</h1>
    <h2>Where knowledge occupies place</h2>
</header>

<nav>Link1 | Link2 | Link3 | Link4</nav>

<main>
    <!-- Aside 1(left top) for news -->
    <aside id="ad1">
        <h2>News</h2>
        <div>Sed scelerisque gravida elementum. Morbi vitae maximus neque, et fermentum mauris. Suspendisse ut
            consectetur odio. Nulla mi mi, mattis id placerat non, semper vitae nibh. Integer sit amet iaculis ex, vitae
            ullamcorper dui. Cras eleifend leo non neque aliquet vestibulum. Cras cursus urna nec lorem varius dapibus.
            Donec a volutpat nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer convallis velit
            ligula, sed hendrerit nibh fringilla quis. n iaculis tortor quis nulla congue finibus. Curabitur egestas
            efficitur elementum. Donec auctor est dui. Vestibulum rutrum, odio ut interdum scelerisque, mi sapien
            pellentesque sem, sit amet blandit lectus arcu et metus. Nullam diam ipsum, iaculis in nisl sed, aliquet
            elementum magna. Phasellus eleifend faucibus magna vitae feugiat. Proin ac euismod metus, sit amet vulputate
            lacus. Nulla eget fermentum ex, a faucibus nisl. Curabitur sem elit, iaculis vitae consectetur a, lobortis
            nec lectus. In maximus magna at felis rutrum, id dignissim leo suscipit. Cras vestibulum cursus augue, vitae
            sodales erat finibus a. In varius ante eu libero bibendum tincidunt. Proin lacinia dolor id tellus blandit,
            porttitor rhoncus est mollis.
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
                <label for=\"user\">User</label>
                <input type=\"text\" name=\"user\" id=\"user\" placeholder=\"DNI+letter\" required=\"\"/>
                <br/><br/>
                <label for=\"pass\">Password</label>
                <input type=\"password\" name=\"pass\" id=\"pass\" required=\"\"/>
                <br/><br/>
                <input type=\"submit\" value=\"Get in\"/>
                <br/><br/>
                <div>You aren't a client yet? <a href=\"register.php?form=new\">Register here</a></div>
            </form>";
        }
        ?>
    </aside>

    <section>
        <h2>Search</h2>
        <article>
            <label for="search">Find your book</label>
            <input type="text" name="search" id="search" placeholder="ISBN, title, author..." required=""/>
            <input type="submit" value="Search"/>
        </article>
        <article>
            <h3>Iaculis tortor</h3>
            In iaculis tortor quis nulla congue finibus. Curabitur egestas efficitur elementum.
        </article>
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
