<?php


namespace Models;

use System\adapterDB;

class customerService
{
    protected $nameDB;
    function __construct($name)
    {
        $this->nameDB = $name;
    }

    public function showAllCustomers()
    {
        return adapterDB::getAll("SELECT * FROM `".$this->nameDB."`");
    }

    public function addCustomer($name)
    {
        return adapterDB::add("INSERT INTO `".$this->nameDB."` SET `name` = ?", $name);
    }
}