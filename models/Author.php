<?php
namespace Models;

class Author
{
    protected $nameDB;

    public function __construct() {
        $this->nameDB = 'author';
    }

    public function getNameDB()
    {
        return $this->nameDB;
    }
}