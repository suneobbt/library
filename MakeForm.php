<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 15/11/2018
 * Time: 2:35
 */

class MakeForm
{
    /**
     * Contains field names and labels
     * @var array
     */
    private $fields = array();
    /**
     * Name of script to process form
     * @var
     */
    private $actionValue;
    /**
     * Value on submit button
     * @var string
     */
    private $submit = "Submit Form";
    /**
     * Number of fields added to the form
     * @var int
     */
    private $Nfields = 0;
    /**
     * Note value.
     * @var
     */
    private $note;
    /**
     * Number of notes
     * @var int
     */
    private $Nnote = 0;
    /**
     * MakeForm constructor.
     * @param $actionValue
     * @param $submit
     */
    public function __construct($actionValue, $submit)
    {
        $this->actionValue = $actionValue;
        $this->submit = $submit;
    } // __construct



    /**
     * Function that adds a field to the form. The user needs to send the name of the field and a label to be displayed.
     * @param $id
     * @param $label
     * @param $type
     * @param string $required
     * @param string $pattern
     * @param string $title
     * @param string $value
     * @param string $disabled
     * @param string $placeholder
     */
    public function addField($id, $label, $type, $required="", $pattern="", $title="", $value="", $disabled="", $placeholder="")
    {
        $this->fields[$this->Nfields]['id'] = $id;
        $this->fields[$this->Nfields]['label'] = $label;
        $this->fields[$this->Nfields]['type'] = $type;
        $this->fields[$this->Nfields]['value'] = $value;
        $this->fields[$this->Nfields]['placeholder'] = $placeholder;
        $this->fields[$this->Nfields]['disabled'] = $disabled;
        $this->fields[$this->Nfields]['required'] = $required;
        $this->fields[$this->Nfields]['pattern'] = $pattern;
        $this->fields[$this->Nfields]['title'] = $title;


        $this->Nfields++;
    } // addField

    //function to add a note at the end of the form
    /**
     * Ad a field note. Interesting for add some important information or some advice.
     * @param $note
     */
    public function addNote($note)
    {
        $this->note = $note;
        $this->Nnote++;
    } // addNote

    /* Display form function to display the form.*/
    /**
     * Prints all the code for html form
     */
    public function displayForm()
    {
        echo "<form action='{$this->actionValue}' method='POST'><div class=\"form-group\">";
        for ($j = 1; $j <= sizeof($this->fields); $j++) {
            echo "<label for='{$this->fields[$j - 1]['id']}'><b>{$this->fields[$j - 1]['label']}</b> </label>";

            echo "<input type='{$this->fields[$j - 1]['type']}' class=\"form-control\" id='{$this->fields[$j - 1]['id']}' 
                name='{$this->fields[$j - 1]['id']}' placeholder='{$this->fields[$j - 1]['placeholder']}' 
                value='{$this->fields[$j - 1]['value']}' {$this->fields[$j - 1]['disabled']} pattern=\"{$this->fields[$j - 1]['pattern']}\"
                title='{$this->fields[$j - 1]['title']}' {$this->fields[$j - 1]['required']}>";
        } // for

        if ($this->Nnote > 0) {
            echo "<p><i>($this->note)</i></p>";
        }

        echo "</div><input type='submit' class=\"btn btn-primary\" value='{$this->submit}'>";
        echo "</form>";
    } // displayForm

} // class Form
?>
