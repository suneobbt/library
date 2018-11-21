<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 19/11/2018
 * Time: 17:07
 */

class Copy
{

    private $id_copy;
    private $isbn;


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
     * Copy constructor no1. Make an object copy using data from database.
     * @param $id_copy
     */
    public function __construct1($id_copy)
    {
        include("connection_data.inc");

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "SELECT * FROM copy where id_copy='$id_copy';";

        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {

            $this->id_copy = $row['id_copy'];
            $this->isbn = $row['isbn'];
        }
    }


    /**
     * @param $id_copy
     * @param $isbn
     */
    public function __construct2($id_copy,$isbn)
    {
        $this->id_copy = $id_copy;
        $this->isbn = $isbn;
    }


    public function insertCopyToBD()
    {
        //TODO: Implement method to insert the values from an object into a database
    }

    public function updateCopyOfBD()
    {
        //TODO: Implement method who modify the data from database with the received data from the object
    }

    /**
     * @return mixed
     */
    public function getIdCopy()
    {
        return $this->id_copy;
    }

    /**
     * @param mixed $id_copy
     */
    public function setIdCopy($id_copy)
    {
        $this->id_copy = $id_copy;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }


}