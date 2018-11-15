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
     * Book constructor.
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

    public function __construct($isbn, $title, $author, $editorial, $edition, $year, $category, $language, $description, $book_condition, $continuous_of, $continued_by)
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

}

















