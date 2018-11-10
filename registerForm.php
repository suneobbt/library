<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 19:49
 */

include_once('User.php');

switch ($_GET['form']) {
    case 'new':
        $dni = "\"";
        $name = "\"";
        $surname = "\"";
        $phone_number = "";
        $city = "";
        $postal_code = "";
        $email = "";
        $direction = "";
        $pass = "";

        break;
    //end case new

    case 'userEdit':
        $work_user = new User($_GET['sessionName']);

        $dni = $work_user->getDni() . "\"" . " disabled";
        $name = $work_user->getName() . "\"" . " disabled";
        $surname = $work_user->getSurname() . "\"" . " disabled";
        $phone_number = $work_user->getPhoneNumber();
        $city = $work_user->getCity();
        $postal_code = $work_user->getPostalCode();
        $email = $work_user->getEmail();
        $direction = $work_user->getDirection();
        $pass = $work_user->getPass();

        break;
    //end case userEdit


    case 'superEdit':
        $work_user = new User($_POST['searchUser']);

        $dni = $work_user->getDni() . "\"";
        $name = $work_user->getName() . "\"";
        $surname = $work_user->getSurname() . "\"";
        $phone_number = $work_user->getPhoneNumber();
        $city = $work_user->getCity();
        $postal_code = $work_user->getPostalCode();
        $email = $work_user->getEmail();
        $direction = $work_user->getDirection();
        $pass = $work_user->getPass();

// TODO: Implement delete user
        break;
    //end case superEdit

}
echo " 
    <h3>Your data</h3>
    <form method=\"post\" action=\"userDataProcess.php\">
        <label for=\"name\">Name</label>
        <input type=\"text\" name=\"nom\" id=\"nom\" title=\"Your name\" value=\"$name required=\"\"/>
        <label for=\"surname\">Surname</label>
        <input type=\"text\" name=\"surname\" id=\"surname\" title=\"Your surname\" value=\"$surname required=\"\"/>
        <br/>
        <br/>
        <label for=\"dni\">DNI</label>
        <input type=\"text\" name=\"dni\" id=\"dni\" title=\"Your DNI number + letter\" value=\"$dni required=\"\"/>
        <br/>
        <br/>
        <label for=\"email\">E-mail</label>
        <input type=\"email\" name=\"email\" id=\"email\" value=\"$email\" required=\"\"/>
        <label for=\"telefon\">Telèfon</label>
        <input type=\"tel\" name=\"telefon\" id=\"telefon\" title=\"Your phone number\" value=\"$phone_number\"/>
        <br/>
        <br/>
        <label for=\"direction\">Direction</label>
        <input type=\"text\" name=\"direction\" id=\"direction\" title=\"Your direction\" value=\"$direction \"/>
        <br/>
        <label for=\"city\">City</label>
        <input type=\"text\" name=\"city\" id=\"city\" title=\"Your city\" value=\"$city\"/>
        <br/>
        <label for=\"postal\">Postal Code</label>
        <input type=\"text\" name=\"postal\" id=\"postal\" title=\"Your postal code\" value=\"$postal_code\"/>
        <br/>
        <br/>
        <label for=\"password\">Password</label>
        <input type=\"password\" name=\"password\" id=\"password\" title=\"Your password\" value=\"$pass\"/>
        <input class=\"noformat\" type=\"submit\" value=\"Enviar\"/>
        <input class=\"noformat\" type=\"reset\" value=\"Esborrar\"/>
    </form>";
