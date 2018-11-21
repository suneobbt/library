<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 21/11/2018
 * Time: 17:38
 */

class ShowData
{
    private $fields = array(); 		 # contains field names and labels
    private $NLines = 0; 			 # number of fields added to the form
    private $actionValue;


    public function __construct($actionValue)
    {
        $this->actionValue = $actionValue;

    } // __construct



    public function addLine($name,$data)
    {
        $this->fields[$this->NLines]['name']  = $name;
        $this->fields[$this->NLines]['data'] = $data;

        $this->NLines++;
    } // addField

    /* Display form function to display the data.*/
    public function displayData()
    {
        echo "<h2></h2>";
        for($j=1; $j <= sizeof($this->fields); $j++)
        {
            echo "<p><label for='{$this->fields[$j - 1]['id']}'>{$this->fields[$j - 1]['label']}: </label>";

            echo "<input type='{$this->fields[$j - 1]['type']}' id='{$this->fields[$j - 1]['id']}' name='{$this->fields[$j - 1]['id']}' placeholder='{$this->fields[$j - 1]['placeholder']}' value='{$this->fields[$j - 1]['value']}' {$this->fields[$j - 1]['disabled']} {$this->fields[$j - 1]['required']}><br/>";
        } // for

        echo "<p><input type='submit' onclick='{$this->actionValue}'>Modify data</p>";
        echo "</form>";
    } // displayForm

} // class ShowData