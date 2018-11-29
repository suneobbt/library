<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 16/11/2018
 * Time: 2:08
 */

class Reserve
{

    private $id_reserve;
    private $start_time_reserve;
    private $dni;
    private $id_copy;

    /**
     * Reserve constructor. Construct overloading.
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
     * Reserve constructor no1. Make an object Reserve using data from database.
     * @param $id_reserve
     */
    public function __construct1($id_reserve)
    {
        include("connection_data.inc");

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "SELECT * FROM reserve where id_reserve='$id_reserve';";

        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {

            $this->id_reserve = $row['id_reserve'];
            $this->start_time_reserve = $row['start_time_reserve'];
            $this->dni = $row['dni'];
            $this->id_copy = $row['id_copy'];
        }
    }


    public function __construct4($id_reserve, $start_time_reserve, $dni, $id_copy)
    {
        $this->id_reserve = $id_reserve;
        $this->start_time_reserve = $start_time_reserve;
        $this->dni = $dni;
        $this->id_copy = $id_copy;
    }

    public function insertReserveToBD($isbn)
    {
        include_once('connection_data2.inc');
        include_once('Available.php');

        $copy = Available::bookAvailable($isbn, $this->start_time_reserve);

        if ($copy < 0) {
            setcookie("date",$this->start_time_reserve,time() + 1);
            setcookie("dni",$this->dni,time() + 1);
            setcookie("isbn",$isbn,time() + 1);
            header("Location: pageForm.php?id=new&ref=reserve&msg=805");
            die();
        } else {
            $this->id_copy = $copy;
        }


        $sentenciaSQL = "INSERT INTO reserve VALUES( 
            '$this->id_reserve',
            '$this->start_time_reserve',
            '$this->dni',
            '$this->id_copy'
            );";

        //echo $sentenciaSQL;
        $sql_result = $connexion->query($sentenciaSQL);

        $sentenciaSQL = "SELECT MAX(id_reserve) as 'id_reserve' FROM reserve;";

        $sql_result2 = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result2)) {
            $lastId_reserve= $row['id_reserve'];

        }
        //echo $sentenciaSQL;

        header("Location: pageBrowse.php?id=" . $lastId_reserve . "&ref=reserve");

    }

    public function updateReserveOfBD()
    {
        include_once('connection_data.inc');

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "UPDATE reserve SET 
            id_reserve='$this->id_reserve',
            start_time_reserve='$this->start_time_reserve',
            dni='$this->dni',
            id_copy='$this->id_copy'

            WHERE id_reserve='$this->id_reserve';";

        echo $sentenciaSQL;

        $sql_result = $connexion->query($sentenciaSQL);
        header("Location: pageBrowse.php?id=" . $this->id_reserve . "&ref=reserve");
    }

    /**
     * @return mixed
     */
    public function getIdReserve()
    {
        return $this->id_reserve;
    }

    /**
     * @param mixed $id_reserve
     */
    public function setIdReserve($id_reserve)
    {
        $this->id_reserve = $id_reserve;
    }

    /**
     * @return mixed
     */
    public function getStartTimeReserve()
    {
        return $this->start_time_reserve;
    }

    /**
     * @param mixed $start_time_reserve
     */
    public function setStartTimeReserve($start_time_reserve)
    {
        $this->start_time_reserve = $start_time_reserve;
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