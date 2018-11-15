<script type="text/javascript" src="functionsJS.js"></script>

<?php

class MakeTable
{
    private $tableName;
    private $numFields;
    private $fieldList = array();
    private $mysqli;
    private $row;
    private $nextRow;
    private $registers;
    private $fileBrowse, $fileUpdate, $fileDelete;
    private $condition;
    private $fieldCondition;


    function __construct($dbName, $tableName, $fieldList, $fileBrowse = "", $fileUpdate = "", $fileDelete = "", $condition = "", $fieldCondition = "")
    {
        $this->dbName = $dbName;
        $this->tableName = $tableName;
        $this->numFields = count($fieldList);

        for ($i = 0; $i < $this->numFields; $i++) {
            $this->fieldList [$i] = $fieldList [$i];
        }

        $this->fileBrowse = $fileBrowse;
        $this->fileUpdate = $fileUpdate;
        $this->fileDelete = $fileDelete;

        $this->condition = $condition;
        $this->fieldCondition = $fieldCondition;

        $this->connectDB($dbName);
    }


    private function connectDB($dbName)
    {
        include("connection_data.inc");
        // conectamos a la BD
        $this->mysqli = new mysqli ($mysql_server, $mysql_login, $mysql_pass, $dbName);
        if ($this->mysqli->connect_errno)
            echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
    }


    public function paintTable()
    {
        $this->paintHeader();

        while ($row = $this->moreRegisters()) { //add results
            $this->paintRow();
        }

        $this->paintFooter();
    }


    public function paintHeader()
    {
        //echo "<h2 align = center> Content of table <u>" . $this->tableName . "</u> from DB <u>". $this->dbName . "</u></h2><br>";
        echo "<table border = \"1\" align = \"center\" width=\"100%\"><tr>";

        for ($i = 0; $i < $this->numFields; $i++) //add fields
        {
            echo "<td align = 'center'><b>" . strtoupper($this->fieldList[$i]) . "</b></td>";
        }

        // painting operations for rows: browse, modify, delete
        if ($this->fileBrowse != "") {
            echo "<td  width='30' height='30' align = 'center'><b> BROWSE </b></td>";
        }
        if ($this->fileUpdate != "") {
            echo "<td  width='30' height='30' align = 'center'><b> UPDATE </b></td>";
        }
        if ($this->fileDelete != "") {
            echo "<td  width='30' height='30' align = 'center'><b> DELETE </b></td>";
        }
        echo "</tr>";

        // to paint in different colors
        $this->row = 0;

        // builing select string
        $sentenciaSQL = "select ";

        for ($i = 0; $i < $this->numFields - 1; $i++) // adding fields to show exc. last.
        {
            $sentenciaSQL .= $this->fieldList[$i] . ", ";
        }

        $sentenciaSQL .= $this->fieldList[$this->numFields - 1] . " from " . $this->tableName;

        if ($this->fieldCondition != "") {
            $sentenciaSQL = $sentenciaSQL . " where " . $this->fieldCondition . "='" . $this->condition . "';";
        }

        //echo "sentence:  " . $sentenciaSQL;

        $this->registers = $this->mysqli->query($sentenciaSQL);

        return $this->mysqli;
    } // paintHeader


    public function paintRow()
    {
        echo "<tr>";

        for ($i = 0; $i < $this->numFields; $i++) {
            echo "<td  width='40' height='30' align = 'center'>" . $this->row[$this->fieldList[$i]] . "</td>";
        }

        $idToGiveInGet = $this->row[$this->fieldList[0]];
        if ($this->fileBrowse != "") {
            echo "<td  width='30' height='30' align = 'center'><a href='$this->fileBrowse?id=" . $idToGiveInGet . "&ref=" . $this->tableName . "'> <img src='res/browse.png'> </a></td>";
        }

        if ($this->fileUpdate != "") {
            echo "<td  width='30' height='30' align = 'center'><a href='$this->fileUpdate?id=" . $idToGiveInGet . "&ref=" . $this->tableName . "'> <img src='res/edit.png'> </a></td>";
        }

        if ($this->fileDelete != "") {
           // echo "<td width='30' height='30' align = 'center'><a href='$this->fileDelete?id=" . $idToGiveInGet . "&ref=" . $this->tableName . "'> <img src='res/delete.png'> </a></td>";
            echo "<td width='30' height='30' align = 'center' onclick=\"deleteRow('$idToGiveInGet','$this->tableName','$this->fileDelete')\"> <a href=#> <img src='res/delete.png'> </a></td>";
        }

    } // paintRow


    public function moreRegisters()
    {
        $this->row = $this->registers->fetch_assoc();
        return ($this->row);
    } // moreRegisters


    public function paintFooter() // closes table and connection DB
    {
        echo "</table>";
    } // paint Footer


} // class MakeTable


?>

