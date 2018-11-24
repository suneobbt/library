<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 16/11/2018
 * Time: 2:08
 */

class Lend
{

    private $id_lend;
    private $start_time_lend;
    private $dni;
    private $id_copy;

    /**
     * Lend constructor. Construct overloading.
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
     * Lend constructor no1. Make an object lend using data from database.
     * @param $id_lend
     */
    public function __construct1($id_lend)
    {
        include("connection_data.inc");

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "SELECT * FROM lend where id_lend='$id_lend';";

        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {

            $this->id_lend = $row['id_lend'];
            $this->start_time_lend = $row['start_time_lend'];
            $this->dni = $row['dni'];
            $this->id_copy = $row['id_copy'];
        }
    }


    /**
     * @param $id_lend
     * @param $start_time_lend
     * @param $dni
     * @param $id_copy
     */
    public function __construct4($id_lend, $start_time_lend, $dni, $id_copy)
    {
        $this->id_lend = $id_lend;
        $this->start_time_lend = $start_time_lend;
        $this->dni = $dni;
        $this->id_copy = $id_copy;
    }


    public function insertLendToBD()
    {
        //TODO: Implement method to insert the values from an object into a database
    }

    public function updateLendOfBD()
    {
        include_once('connection_data.inc');

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "UPDATE lend SET 
            id_lend='$this->id_lend',
            start_time_lend='$this->start_time_lend',
            dni='$this->dni',
            id_copy='$this->id_copy'

            WHERE id_lend='$this->id_lend';";

        echo $sentenciaSQL;

        $sql_result = $connexion->query($sentenciaSQL);
        header ("Location: pageBrowse.php?id=".$this->id_lend."&ref=lend");
    }

    /**
     * @return mixed
     */
    public function getIdLend()
    {
        return $this->id_lend;
    }

    /**
     * @param mixed $id_lend
     */
    public function setIdLend($id_lend)
    {
        $this->id_lend = $id_lend;
    }

    /**
     * @return mixed
     */
    public function getStartTimeLend()
    {
        return $this->start_time_lend;
    }

    /**
     * @param mixed $start_time_lend
     */
    public function setStartTimeLend($start_time_lend)
    {
        $this->start_time_lend = $start_time_lend;
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


}