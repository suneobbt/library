<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 03/11/2018
 * Time: 14:23
 */

class User
{
    private $dni;
    private $name;
    private $surname;
    private $user_type;
    private $phone_number;
    private $city;
    private $postal_code;
    private $email;
    private $direction;
    private $pass;

    function __construct($user)
    {
        include("connection_data.inc");

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "SELECT dni,name,surname,user_type,phone_number,city,postal_code,email,direction,pass FROM users where dni='$user';";

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