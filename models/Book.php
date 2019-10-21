<?php
namespace Models;

class Book
{
    protected $nameDB;

    public function __construct() {
        $this->nameDB = 'book';
    }

    public function getNameDB()
    {
        return $this->nameDB;
    }
}