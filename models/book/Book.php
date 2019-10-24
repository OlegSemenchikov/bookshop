<?php
namespace Models\Book;

class Book
{
    protected $idBook;
    protected $title;
    protected $pages;
    protected $year;
    protected $price;
    protected $arrAuthors;

    public function setId($str)
    {
        $this->idBook = $str;
    }

    public function getId()
    {
        return $this->idBook ;
    }

    public function setTitle($str)
    {
        $this->title = $str;
    }

    public function getTitle()
    {
        return $this->title ;
    }

    public function setPages($str)
    {
        $this->pages = $str;
    }

    public function getPages()
    {
        return $this->pages ;
    }

    public function setYear($str)
    {
        $this->year = $str;
    }

    public function getYear()
    {
        return $this->year ;
    }

    public function setPrice($str)
    {
        $this->price = $str;
    }

    public function getPrice()
    {
        return $this->price ;
    }

    public function setArrAuthors(array $arrObjAuthors)
    {
            $this->arrAuthors = $arrObjAuthors;
    }

    public function getArrAuthors()
    {
        return $this->arrAuthors ;
    }

}