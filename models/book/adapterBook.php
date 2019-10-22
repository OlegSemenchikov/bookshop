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

    public function addBook($title)
    {
        return DB::add("INSERT INTO `".$this->nameDB."` SET `title` = ?", $title);
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