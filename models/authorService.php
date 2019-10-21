<?php


namespace Models;

use System\adapterDB;

class authorService
{
    protected $nameDB;
    function __construct($name)
    {
        $this->nameDB = $name;
    }

    public function showAllAuthors()
    {
        return adapterDB::getAll("SELECT * FROM `".$this->nameDB."`");
    }

    public function addAuthor($name)
    {
        return adapterDB::add("INSERT INTO `".$this->nameDB."` SET `name` = ?", $name);
    }
}