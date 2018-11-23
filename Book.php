<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 04/11/2018
 * Time: 0:12
 */

Class Book
{
    private $isbn;
    private $title;
    private $author;
    private $editorial;
    private $edition;
    private $year;
    private $category;
    private $language;
    private $description;
    private $book_condition;
    private $continuous_of;
    private $continued_by;

    /**
     * Book constructor. Construct overloading.
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
     * Book constructor no1. Make an object book using data from database.
     * @param $isbn
     */
    public function __construct1($isbn)
    {
        include("connection_data.inc");

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "SELECT * FROM book where isbn='$isbn';";

        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {

            $this->isbn = $row['isbn'];
            $this->title = $row['title'];
            $this->author = $row['author'];
            $this->editorial = $row['editorial'];
            $this->edition = $row['edition'];
            $this->year = $row['year'];
            $this->category = $row['category'];
            $this->language = $row['language'];
            $this->description = $row['description'];
            $this->book_condition = $row['book_condition'];
            $this->continuous_of = $row['continuous_of'];
            $this->continued_by = $row['continued_by'];
        }
    }

    /**
     * Book constructor no12. Make an object book using recived via param.
     * @param $isbn
     * @param $title
     * @param $author
     * @param $editorial
     * @param $edition
     * @param $year
     * @param $category
     * @param $language
     * @param $description
     * @param $book_condition
     * @param $continuous_of
     * @param $continued_by
     */
    public function __construct12($isbn, $title, $author, $editorial, $edition, $year, $category, $language, $description, $book_condition, $continuous_of, $continued_by)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->editorial = $editorial;
        $this->edition = $edition;
        $this->year = $year;
        $this->category = $category;
        $this->language = $language;
        $this->description = $description;
        $this->book_condition = $book_condition;
        $this->continuous_of = $continuous_of;
        $this->continued_by = $continued_by;
    }

    /**
     *
     */
    public function insertBookToBD()
    {
        //TODO: Implement method to insert the values from an object into a database
    }

    /**
     */
    public function updateBookOfBD()
    {
        include_once('connection_data.inc');

        $connexion = new mysqli ($mysql_server, $mysql_login, $mysql_pass, "library");

        if ($connexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die();
        }

        $sentenciaSQL = "UPDATE book SET 
            isbn='$this->isbn',
            title='$this->title',
            author='$this->author',
            editorial='$this->editorial',
            edition='$this->edition',
            year='$this->year',
            category='$this->category',
            language='$this->language',
            description='$this->description',
            book_condition='$this->book_condition',
            continuous_of='$this->continuous_of',
            continued_by='$this->continued_by'
            WHERE isbn='$this->isbn';";

        //echo $sentenciaSQL;

        $sql_result = $connexion->query($sentenciaSQL);
        header ("Location: pageBrowse.php?id=".$this->isbn."&ref=book");
    }


    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * @param mixed $editorial
     */
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }

    /**
     * @return mixed
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * @param mixed $edition
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getBookCondition()
    {
        return $this->book_condition;
    }

    /**
     * @param mixed $book_condition
     */
    public function setBookCondition($book_condition)
    {
        $this->book_condition = $book_condition;
    }

    /**
     * @return mixed
     */
    public function getContinuousOf()
    {
        return $this->continuous_of;
    }

    /**
     * @param mixed $continuous_of
     */
    public function setContinuousOf($continuous_of)
    {
        $this->continuous_of = $continuous_of;
    }

    /**
     * @return mixed
     */
    public function getContinuedBy()
    {
        return $this->continued_by;
    }

    /**
     * @param mixed $continued_by
     */
    public function setContinuedBy($continued_by)
    {
        $this->continued_by = $continued_by;
    }

}

















