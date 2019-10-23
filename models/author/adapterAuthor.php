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

    public function addAuthor($surname, $name, $patronymic)
    {
        return DB::add("INSERT INTO `".$this->nameDB."` SET `surname` = ?, `name` = ?, `patronymic` = ?", array($surname, $name, $patronymic));
    }

    public function getCountBooks($idAuthor)
    {
        return DB::getValue("SELECT COUNT(b_a.id_book) FROM book_author AS b_a WHERE b_a.id_author = ?", $idAuthor);
    }
}