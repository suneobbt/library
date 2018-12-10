<script type="text/javascript" src="functionsJS.js"></script>

<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 21/11/2018
 * Time: 17:38
 */

class ShowData
{
    /**
     * Array of lines
     * @var array
     */
    private $lines = array();
    /**
     * Number of lines
     * @var int
     */
    private $NLines = 0;
    /**
     * Action to execute on modify button
     * @var
     */
    private $actionModify;
    /**
     * Action to execute on delete button
     * @var
     */
    private $actionDelete;
    /**
     * Determines if its necessary to insert the modify button
     * @var bool
     */
    private $buttonModifyOn = false;
    /**
     * Determines if its necessary to insert the delete button
     * @var bool
     */
    private $buttonDeleteOn = false;


    /**
     * Constructor. Empty constructor.
     * ShowData constructor.
     */
    public function __construct()
    {}

    /**
     * Adds buttons at the end.
     * @param $actionDelete
     * @param $actionModify
     */
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

    /**
     * Adds a new data line.
     * @param $name
     * @param $data
     */
    public function addLine($name, $data)
    {
        $this->lines[$this->NLines]['name'] = $name;
        $this->lines[$this->NLines]['data'] = $data;

        $this->NLines++;
    } // addLine

    /* Display data function to display the data.*/
    /**
     * Prints all the data.
     */
    public function displayData()
    {

        for ($j = 1; $j <= sizeof($this->lines); $j++) {
            echo "<p><b>{$this->lines[$j - 1]['name']}:</b>  ";

            echo " {$this->lines[$j - 1]['data']}</p>";
        } // for

        if ($this->buttonModifyOn) echo "<a href='{$this->actionModify}' class=\"btn btn-warning\">Modify data</a>&nbsp";
        if ($this->buttonDeleteOn) echo "<a href=# onclick=\"{$this->actionDelete}\"  class=\"btn btn-danger\" >Delete it</a>";

    } // displayData

} // class ShowData