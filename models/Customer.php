<?php

namespace Models;

class Customer
{
    protected $nameDB;

    public function __construct() {
        $this->nameDB = 'customer';
    }

    public function getNameDB()
    {
        return $this->nameDB;
    }
}