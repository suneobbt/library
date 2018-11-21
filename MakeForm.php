<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 15/11/2018
 * Time: 2:35
 */

class MakeForm
{
    private $fields = array(); 		 # contains field names and labels
    private $actionValue; 			 # name of script to process form
    private $submit = "Submit Form"; # value on submit button
    private $Nfields = 0; 			 # number of fields added to the form


    public function __construct($actionValue,$submit)
    {
        $this->actionValue = $actionValue;
        $this->submit = $submit;
    } // __construct


// Function that adds a field to the form. The user needs to
// send the name of the field and a label to be displayed.
    public function addField($id,$label,$type,$required="",$disabled="",$value="",$placeholder="")
    {
        $this->fields[$this->Nfields]['id']  = $id;
        $this->fields[$this->Nfields]['label'] = $label;
        $this->fields[$this->Nfields]['type'] = $type;
        $this->fields[$this->Nfields]['value'] = $value;
        $this->fields[$this->Nfields]['placeholder'] = $placeholder;
        $this->fields[$this->Nfields]['disabled'] = $disabled;
        $this->fields[$this->Nfields]['required'] = $required;


        $this->Nfields++;
    } // addField

    /* Display form function to display the form.*/
    public function displayForm()
    {
        echo "<form action='{$this->actionValue}' method='POST'>";
        for($j=1; $j <= sizeof($this->fields); $j++)
        {
            echo "<p><label for='{$this->fields[$j - 1]['id']}'>{$this->fields[$j - 1]['label']}: </label>";

            echo "<input type='{$this->fields[$j - 1]['type']}' id='{$this->fields[$j - 1]['id']}' name='{$this->fields[$j - 1]['id']}' placeholder='{$this->fields[$j - 1]['placeholder']}' value='{$this->fields[$j - 1]['value']}' {$this->fields[$j - 1]['disabled']} {$this->fields[$j - 1]['required']}><br/>";
        } // for

        echo "<p><input type='submit' value='{$this->submit}'></p>";
        echo "</form>";
    } // displayForm

} // class Form
?>
