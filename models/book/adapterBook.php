<?php


namespace Models\Book;

use System\DB;

class adapterBook
{
    protected $nameDB;

    function __construct()
    {
        $this->nameDB = 'book';
    }

    public function selectAllBooks()
    {
        return DB::getAll("SELECT * FROM `".$this->nameDB."`");
    }

    public function selectAuthorsBook($idBook)
    {
        return DB::getAll("SELECT * FROM author AS a WHERE a.id_author  IN (SELECT b_a.id_author FROM book_author AS b_a WHERE b_a.id_book = ?) ORDER BY a.surname", $idBook);

    }

    public function addBook($title, $pages, $year, $price)
    {
        return DB::add("INSERT INTO `".$this->nameDB."` SET `title` = ?, `pages` = ?, `year` = ?, `price` = ?", array($title, $pages, $year, $price));
    }

    public function selectBook($idBook)
    {
        return DB::getRow("SELECT * FROM `".$this->nameDB."` WHERE `id_book` = ?", $idBook);
    }

    public function updateBook($idBook, $title, $pages, $year, $price)
    {
        return DB::set("UPDATE `".$this->nameDB."` SET `title` = ?, `pages` = ?, `year` = ?, `price` = ?  WHERE `id_book` = ?", array($title, $pages, $year, $price, $idBook));
    }
}