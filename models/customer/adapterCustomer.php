<?php

namespace Models\Customer;

use System\DB;

class adapterCustomer
{
    protected $nameDB;

    function __construct()
    {
        $this->nameDB = 'customer';
    }

    public function selectAllCustomers()
    {
        return DB::getAll("SELECT * FROM `".$this->nameDB."`");
    }

    public function addCustomer($name)
    {
        return DB::add("INSERT INTO `".$this->nameDB."` SET `name` = ?", $name);
    }
}