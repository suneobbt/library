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

// Constructor: User passes in the name of the script where
// form data is to be sent ($actionValue) and the value to
// display on the submit button.
    function __construct($actionValue,$submit)
    {
        $this->actionValue = $actionValue;
        $this->submit = $submit;
    } // __construct


// Function that adds a field to the form. The user needs to
// send the name of the field and a label to be displayed.
    function addField($name,$label,$value="",$placeholder="")
    {
        $this->fields[$this->Nfields]['name']  = $name;
        $this->fields[$this->Nfields]['label'] = $label;
        $this->fields[$this->Nfields]['value'] = $value;
        $this->Nfields++;
    } // addField

    /* Display form function to display the form.
     */
    function displayForm()
    {
// kk print_r ($this->fields);
// Uncomment to see this 2 dimensional array. Ex:
// Array ( [0] => Array ( [name] => first_name 	[label] 	=> First Name )
//         [1] => Array ( [name] => last_name 	[label] 	=> Last Name )
//         [2] => Array ( [name] => phone 		[label] 	=> Phone ) )

        echo "\n <form action='{$this->actionValue}' method='POST'> \n";
        for($j=1; $j <= sizeof($this->fields); $j++)
        {
            echo "<p style='clear: left; margin: 0; padding: 0;padding-top: 5px'>\n";
            echo "<label style='float: left; width: 20%'>       {$this->fields[$j - 1]['label']}: </label>\n";
            echo "<input style='width: 200px' type='text' name='{$this->fields[$j - 1]['name']}' value='{$this->fields[$j - 1]['value']}'></p>\n";
        } // for


        /*
        Note: At the strings previously seen, as for example $this->fields[$j - 1]['label'], we use curly brackets ({}) to show the
        content of the array possition. For a single variables, you can just put it into "" strings without the {}. For array elements you might HAVE to use
        the curly brackets. Example
          $name = "Kico";
          echo "Hello world, $name"; // it works

          $nameString[0][0] = "Kico";
          $nameString[0][1] = "Pepe";
          echo "Hello world, $nameString[0][0]";        // it DOES NOT works !!
          echo " and Hello world, {$nameString[0][1]}"; // it DOES works

        */


        echo "<input type='submit' value='{$this->submit}'style='margin-left: 25%; margin-top: 10px'>\n";
        echo "</form>";
    } // displayForm

} // class Form
?>
