<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 13:02
 */

include_once('User.php');

// $work_user=new User($_GET['sessionName']);
// $work_user created on first include in extendedUser_toolsMenu

switch ($work_user->getUserType()) {
    case 0:
        ?>
        <section>
            <article>
                <h3>Find your next book</h3>
                <form method="post" action="pageListed.php?ref=book">
                    <label for="patternSearch">Search</label>
                    <input type="text" name="patternSearch" id="patternSearch" required=""/><br/>

                    <label for="fieldSearch">Search by: </label>
                    <select id="fieldSearch" name="fieldSearch" required="">
                        <option value="isbn" selected="selected">ISBN</option>
                        <option value="title">Title</option>
                        <option value="author">Author</option>
                        <option value="editorial">Editorial</option>
                        <option value="year">Year</option>
                        <option value="category">Category</option>
                        <option value="language">Language</option>
                    </select><br/>

                    <input type="submit" value="Search"/>
                </form>
            </article>
        </section>
        <section>
            <article>
                <h3>Recomendations</h3>
                In iaculis tortor quis nulla congue finibus. Curabitur egestas efficitur elementum.
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
                <form method="post" action="pageListed.php?ref=lend">
                    <label for="patternSearch">Search:</label>
                    <input type="text" name="patternSearch" id="patternSearch" required="" placeholder="Scan a book"/>
                    <input type="hidden" name="fieldSearch" id="fieldSearch" value="isbn"/>
                    <input type="submit" class="btn btn-primary" value="Search"/>
                </form>
            </article>
        </section>
        <section>
            <article>
                <h3>Pick Up Book</h3>
                <form method="post" action="pageListed.php?ref=reserve">
                    <label for="patternSearch">Search:</label>
                    <input type="text" name="patternSearch" id="patternSearch" required="" placeholder="Scan a book"/>
                    <input type="hidden" name="fieldSearch" id="fieldSearch" value="isbn"/>
                    <input type="submit" class="btn btn-primary" value="Search"/>
                </form>
            </article>
        </section>
        <section>
            <article>
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
                    <input type="submit" class="btn btn-primary" value="Search"/>
                </form>

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
                    <input type="submit" class="btn btn-primary" value="Search"/>
                </form>
            </article>
        </section>
        <section>
            <article>
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
                    <input type="submit" class="btn btn-primary" value="Search"/>
                </form>
            </article>
        </section>

        <?php
        break;
    //end case 2
}
