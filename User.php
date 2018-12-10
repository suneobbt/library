<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 14:23
 */

class User
{
    /**
     * User DNI
     * @var
     */
    private $dni;
    /**
     * User Name
     * @var
     */
    private $name;
    /**
     * User Surname
     * @var
     */
    private $surname;
    /**
     * Type of user (0-Normal user, 1-Librarian, 2-Administrator)
     * @var
     */
    private $user_type;
    /**
     * User phone number
     * @var
     */
    private $phone_number;
    /**
     * User city
     * @var
     */
    private $city;
    /**
     * User Postal Code
     * @var
     */
    private $postal_code;
    /**
     * User email
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $direction;
    /**
     * User phisical direction
     * @var
     */
    private $pass;


    /**
     * User constructor. Construct overloading.
     */
    public function __construct()
    {
        //get an array with the parameters sent to the function
        $params = func_get_args();

        //extract the number of parameters received
        $num_params = func_num_args();

        //each constructor of a given number of parameters will have a function name
        //attending to the following model __construct1() __construct2()...
        $f_constructor = '__construct' . $num_params;

        //check if there is a constructor with that number of parameters
        if (method_exists($this, $f_constructor)) {

            // if that function existed,invoke it, resending the parameters received in the original constructor
            call_user_func_array(array($this, $f_constructor), $params);
        }
    }

    /**
     * Constructor 1. Constructs an user object with the data already saved in DB.
     * @param $dni
     */
    function __construct1($dni)
    {
        include("connection_data.inc");

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "SELECT * FROM users where dni='$dni';";

        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {
            $this->dni = $row['dni'];
            $this->name = $row['name'];
            $this->surname = $row['surname'];
            $this->user_type = $row['user_type'];
            $this->phone_number = $row['phone_number'];
            $this->city = $row['city'];
            $this->postal_code = $row['postal_code'];
            $this->email = $row['email'];
            $this->direction = $row['direction'];
            $this->pass = $row['pass'];
        }

        mysqli_close($connexion);
    }

    /**
     * Constructor 10. Creates an user object with the data received by args.
     * @param $dni
     * @param $name
     * @param $surname
     * @param $pass
     * @param $user_type
     * @param $phone_number
     * @param $city
     * @param $postal_code
     * @param $email
     * @param $direction
     */
    function __construct10($dni, $name, $surname, $pass, $user_type, $phone_number, $city, $postal_code, $email, $direction)
    {
        $this->dni = $dni;
        $this->name = $name;
        $this->surname = $surname;
        $this->user_type = $user_type;
        $this->phone_number = $phone_number;
        $this->city = $city;
        $this->postal_code = $postal_code;
        $this->email = $email;
        $this->direction = $direction;
        $this->pass = $pass;
    }

    /**
     * Insert a new user to de DB.
     * @param $register
     */
    public function insertUserToBD($register)
    {
        include_once('connection_data.inc');

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "INSERT INTO users VALUES( 
            '$this->dni',
            '$this->name',
            '$this->surname',
            '$this->pass',
            '$this->user_type',
            '$this->phone_number',
            '$this->city',
            '$this->postal_code',
            '$this->email',
            '$this->direction'
            );";

        echo $sentenciaSQL;

        $sql_result = $connexion->query($sentenciaSQL);

        if ($sql_result) {

            if ($register) {
                header("Location: index.php?msg=806");
            } else {
                header("Location: pageBrowse.php?id=" . $this->dni . "&ref=users");
            }

        } else {

            if ($register) {
                header("Location: index.php?register=true&msg=807");
            } else {
                header("Location:" . $_SERVER['HTTP_REFERER'] . "&msg=805");
            }

        }

    }

    /**
     * Modify an user from the DB.
     */
    public function updateUserOfBD()
    {
        include_once('connection_data.inc');

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "UPDATE users SET 
            dni='$this->dni',
            name='$this->name',
            surname='$this->surname',
            user_type='$this->user_type',
            phone_number='$this->phone_number',
            city='$this->city',
            postal_code='$this->postal_code',
            email='$this->email',
            direction='$this->direction',
            pass='$this->pass'

            WHERE dni='$this->dni';";

        //echo $sentenciaSQL;

        $sql_result = $connexion->query($sentenciaSQL);
        header("Location: pageBrowse.php?id=" . $this->dni . "&ref=users");
    }
    //Getters and setters

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * @param mixed $user_type
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @param mixed $postal_code
     */
    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param mixed $direction
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
    }


}