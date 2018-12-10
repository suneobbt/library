<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 16/11/2018
 * Time: 2:08
 */

class Lend
{

    /**
     * ID of a lend
     * @var
     */
    private $id_lend;
    /**
     * Date start the lend
     * @var
     */
    private $start_time_lend;
    /**
     * DNI of the lend owner
     * @var
     */
    private $dni;
    /**
     * ID of the copy lended
     * @var
     */
    private $id_copy;
    /**
     * VAlue if is returned(bool)
     * @var
     */
    private $returned;

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
            $this->returned = $row['returned'];
        }
    }


    /**
     * Constructor5. Create a new lend based on de values received by args.
     * @param $id_lend
     * @param $start_time_lend
     * @param $dni
     * @param $id_copy
     * @param $returned
     */
    public function __construct5($id_lend, $start_time_lend, $dni, $id_copy, $returned)
    {
        $this->id_lend = $id_lend;
        $this->start_time_lend = $start_time_lend;
        $this->dni = $dni;
        $this->id_copy = $id_copy;
        $this->returned = $returned;
    }


    /**
     * Insert new lend into DB
     * @param $isbn
     */
    public function insertLendToBD($isbn)
    {
        include_once('connection_data2.inc');
        include_once('Available.php');

        $date = date_create();
        $this->start_time_lend = strval(date_format($date, "Y/m/d"));
        $copy=Available::bookReserved($this->dni);

        if ($copyReserved<0){
            $copy = Available::bookAvailable($isbn, $this->start_time_lend);
        }

        if ($copy < 0) {
            setcookie("dniLend", $this->dni, time() + 1);
            setcookie("isbnLend", $isbn, time() + 1);
            header("Location: pageForm.php?id=new&ref=lend&msg=804");
            die();
        } else {
            $this->id_copy = $copy;
        }

        $sentenciaSQL = "INSERT INTO lend VALUES( 
            '$this->id_lend',
            '$this->start_time_lend',
            '$this->dni',
            '$this->id_copy',
            '$this->returned'
            );";

        echo $sentenciaSQL;
        $sql_result = $connexion->query($sentenciaSQL);

        $sentenciaSQL = "SELECT MAX(id_lend) as 'id_lend' FROM lend;";

        $sql_result2 = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result2)) {
            $lastId_lend = $row['id_lend'];

        }
        echo $sentenciaSQL;

        header("Location: pageBrowse.php?id=" . $lastId_lend . "&ref=lend");

    }

    /**
     * Update a lend entry from the DB
     */
    public function updateLendOfBD()
    {
        include_once('connection_data2.inc');

        // $returnedValue = $this->returned === 'true' ? 1 : 0;


        $sentenciaSQL = "UPDATE lend SET 
            id_lend='$this->id_lend',
            start_time_lend='$this->start_time_lend',
            dni='$this->dni',
            id_copy='$this->id_copy',
            returned='$this->returned'

            WHERE id_lend='$this->id_lend';";

        echo $sentenciaSQL;

        $sql_result = $connexion->query($sentenciaSQL);
        header("Location: pageBrowse.php?id=" . $this->id_lend . "&ref=lend");
    }

    /**
     * @return mixed
     */
    public function getReturned()
    {
        return $this->returned;
    }

    /**
     * @param mixed $returned
     */
    public function setReturned($returned)
    {
        $this->returned = $returned;
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