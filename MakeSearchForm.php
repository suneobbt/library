<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 08/12/2018
 * Time: 20:50
 */

class MakeSearchForm
{

    /**
     * Define de searched value.
     * @var
     */
    private $searched;

    /**
     * Define the type of the search engine: conventional search o specific(return and pick up a book).
     * @var
     */
    private $findEngine;

    /**
     * MakeSearchForm constructor.
     * @param $searched
     * @param $findEngine
     */
    public function __construct($searched, $findEngine)
    {
        $this->searched = $searched;
        $this->findEngine = $findEngine;
    }

    /**
     * Displays the search form.
     */
    public function displayForm()
    {
        echo "<form method=\"post\" action=\"pageListed.php?ref=$this->searched\">
                    <div class=\"form-row align-items-center\">
                        <div class=\"col-auto\">
                            <label class=\"sr-only\" for=\"patternSearch\">Search</label>
                            <div class=\"input-group mb-2\">
                                <div class=\"input-group-prepend\">
                                    <div class=\"input-group-text\">Search</div>
                                </div>
                                <input type=\"text\" class=\"form-control\" name=\"patternSearch\" id=\"patternSearch\"
                                       required=\"\"
                                       placeholder=\"Scan a book\">
                                       ";
        if ($this->findEngine) {
            if ($this->searched == "book") {
                echo " &nbsp <select class=\"form-control\" id=\"fieldSearch\" name=\"fieldSearch\" required=\"\">
                                    <option value=\"isbn\" selected=\"selected\">ISBN</option>
                                    <option value=\"title\">Title</option>
                                    <option value=\"author\">Author</option>
                                    <option value=\"editorial\">Editorial</option>
                                    <option value=\"year\">Year</option>
                                    <option value=\"category\">Category</option>
                                    <option value=\"language\">Language</option>
                                </select>
                                ";
            } else if ($this->searched == "users") {
                echo " &nbsp <select class=\"form-control\" id=\"fieldSearch\" name=\"fieldSearch\" required=\"\">
                        <option value=\"dni\" selected=\"selected\">DNI</option>
                        <option value=\"name\">Name</option>
                        <option value=\"surname\">Surname</option>
                        <option value=\"email\">E-Mail</option>
                        <option value=\"phone_number\">Phone number</option>
                        <option value=\"postal_code\">Postal code</option>
                        <option value=\"city\">City</option>
                    </select>";
            } else  {
                echo"&nbsp<select class=\"form-control\" id=\"fieldSearch\" name=\"fieldSearch\" required=\"\">
                            <option value=\"isbn\" selected=\"selected\">ISBN</option>
                            <option value=\"dni\">DNI</option>
                        </select>";
            }
        }else{
            echo"<input type=\"hidden\" name=\"fieldSearch\" id=\"fieldSearch\" class=\"form-control\"
                                       id=\"inlineFormInputGroup\" value=\"isbn\">";
        }

        echo "
                 </div >
                        </div >
                        <div class=\"col-auto\">
                            <button type=\"submit\" class=\"btn btn-primary mb-2\">Submit</button>
                        </div>
                    </div>
                </form>";


    }

}