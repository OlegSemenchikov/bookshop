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
}