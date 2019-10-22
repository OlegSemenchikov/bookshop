<?php

namespace Models\Author;

use System\DB;

class adapterAuthor
{
    protected $nameDB;

    function __construct()
    {
        $this->nameDB = 'author';
    }

    public function selectAllAuthors()
    {
        return DB::getAll("SELECT * FROM `".$this->nameDB."`");
    }

    public function addAuthor($name)
    {
        return DB::add("INSERT INTO `".$this->nameDB."` SET `name` = ?", $name);
    }
}