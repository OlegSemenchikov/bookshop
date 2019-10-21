<?php


namespace Models;

use System\adapterDB;

class bookService
{
    protected $nameDB;
    function __construct($name)
    {
        $this->nameDB = $name;
    }

    public function showAllBooks()
    {
        return adapterDB::getAll("SELECT * FROM `".$this->nameDB."`");
    }

    public function addBook($title)
    {
        return adapterDB::add("INSERT INTO `".$this->nameDB."` SET `title` = ?", $title);
    }
}