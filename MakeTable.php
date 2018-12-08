<script type="text/javascript" src="functionsJS.js"></script>

<?php

class MakeTable
{
    private $tableName;
    private $numFields;
    private $fieldList = array();
    private $mysqli;
    private $row;
    //private $nextRow;
    private $registers;
    private $fileBrowse, $fileUpdate, $fileDelete, $filePickUp, $fileReturn;
    private $condition;
    private $condition2;
    private $fieldCondition;


    function __construct($dbName, $tableName, $fieldList, $fileBrowse = "", $fileUpdate = "", $fileDelete = "", $condition = "", $fieldCondition = "", $condition2 = "", $filePickUp = "", $fileReturn = "")
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
        $this->filePickUp = $filePickUp;
        $this->fileReturn = $fileReturn;

        $this->condition = $condition;
        $this->condition2 = $condition2;
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
        $empty=true;// if we don't have any result will print a message
        $this->paintHeader();

        while ($row = $this->moreRegisters()) { //add results
            $empty=false;
            $this->paintRow();
        }
        $this->paintFooter();

        if($empty)echo "<p><b>Sorry, no results for this search. Try again.</b></p>";
    }


    public function paintHeader()
    {
        echo "<table class=\"table table-hover table-dark table-sm\" border = \"1\" align = \"center\" width=\"100%\"><tr>";

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
        if ($this->filePickUp != "") {
            echo "<td  width='30' height='30' align = 'center'><b> PICKUP </b></td>";
        }
        if ($this->fileReturn != "") {
            echo "<td  width='30' height='30' align = 'center'><b> RETURN </b></td>";
        }
        if ($this->fileDelete != "") {
            echo "<td  width='30' height='30' align = 'center'><b> DELETE </b></td>";
        }
        echo "</tr>";

        $this->row = 0;

        $sentenciaSQL = "SELECT ";

        for ($i = 0; $i < $this->numFields - 1; $i++) // adding fields to show exc. last.
        {
            $sentenciaSQL .= $this->fieldList[$i] . ", ";
        }

        $sentenciaSQL .= $this->fieldList[$this->numFields - 1] . " FROM " . $this->tableName;

        if ($this->fieldCondition != "") {
            $sentenciaSQL = $sentenciaSQL . " WHERE " . $this->fieldCondition . "='" . $this->condition . "'";
        }

        if ($this->condition2 != "") {
            $sentenciaSQL = $sentenciaSQL . $this->condition2 . ";";
        } else {
            $sentenciaSQL = $sentenciaSQL . ";";
        }

        //echo "sentence:  " . $sentenciaSQL;

        $this->registers = $this->mysqli->query($sentenciaSQL);

        return $this->mysqli;
    } // paintHeader


    public function paintRow()
    {
        echo "<tr>";

        for ($i = 0; $i < $this->numFields; $i++) {
            if ($this->fieldList[$i] == "reserve.id_copy" || $this->fieldList[$i] == "lend.id_copy") {
                echo "<td  width='40' height='30' align = 'center'>" . $this->row["id_copy"] . "</td>";
            } else {
                echo "<td  width='40' height='30' align = 'center'>" . $this->row[$this->fieldList[$i]] . "</td>";
            }
        }

        $idToGiveInGet = $this->row[$this->fieldList[0]];
        $dniToGiveInGet = $this->row[$this->fieldList[1]];

        if ($this->fileBrowse != "") {
            echo "<td  width='30' height='30' align = 'center'><a href='$this->fileBrowse?id=" . $idToGiveInGet . "&ref=" . $this->tableName . "'> <img src='res/icons/browse.png'> </a></td>";
        }

        if ($this->fileUpdate != "") {
            echo "<td  width='30' height='30' align = 'center'><a href='$this->fileUpdate?id=" . $idToGiveInGet . "&ref=" . $this->tableName . "'> <img src='res/icons/edit.png'> </a></td>";
        }

        if ($this->filePickUp != "") {
            include_once("Copy.php");
            $isbnToGiveInGet = $this->row["id_copy"];
            $workcopy = new Copy($isbnToGiveInGet);
            $isbnToGiveInGet = $workcopy->getIsbn();
            echo "<td  width='30' height='30' align = 'center'><a href='$this->filePickUp?id=new&ref=lend&dniLend=" . $dniToGiveInGet . "&isbnLend=" . $isbnToGiveInGet . "'> <img src='res/icons/pickup.png'> </a></td>";
        }

        if ($this->fileReturn != "") {
            echo "<td  width='30' height='30' align = 'center'><a href='$this->fileReturn?id=" . $idToGiveInGet . "&ref=return" . "'> <img src='res/icons/return.png'> </a></td>";
        }

        if ($this->fileDelete != "") {
            echo "<td width='30' height='30' align = 'center' onclick=\"deleteRow('$idToGiveInGet','$this->tableName','$this->fileDelete')\"> <a href=#> <img src='res/icons/delete.png'> </a></td>";
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

