<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 21/11/2018
 * Time: 17:38
 */

class ShowData
{
    private $lines = array();         # contains field names and labels
    private $NLines = 0;             # number of fields added to the form
    private $actionModify;
    private $actionDelete;
    private $buttonModifyOn = false;
    private $buttonDeleteOn = false;


    public function __construct()
    {}

    public function addButtons($actionDelete, $actionModify)
    {
        if ($actionModify!="")
        {
            $this->buttonModifyOn = true;
            $this->actionModify = $actionModify;
        }
        if ($actionDelete!="")
        {
            $this->buttonDeleteOn = true;
            $this->actionDelete = $actionDelete;
        }


    }

    public function addLine($name, $data)
    {
        $this->lines[$this->NLines]['name'] = $name;
        $this->lines[$this->NLines]['data'] = $data;

        $this->NLines++;
    } // addField

    /* Display data function to display the data.*/
    public function displayData()
    {

        for ($j = 1; $j <= sizeof($this->lines); $j++) {
            echo "<p><b>{$this->lines[$j - 1]['name']}:</b>  ";

            echo " {$this->lines[$j - 1]['data']}</p>";
        } // for

        if ($this->buttonModifyOn) echo "<a href='{$this->actionModify}'>Modify data</a>";
        if ($this->buttonDeleteOn) echo "<a onclick='{$this->actionDelete}'>Delete it</a>";

    } // displayForm

} // class ShowData