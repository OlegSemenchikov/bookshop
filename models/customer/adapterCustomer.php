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

    public function selectBooksCustomer($idCustomer)
    {
        return DB::getAll("SELECT b_c.id_book, b.title, b.pages, b.year, b.price FROM book_customer AS b_c LEFT JOIN book AS b ON b_c.id_book = b.id_book WHERE b_c.id_customer = ? ORDER BY b.title", $idCustomer);
    }

    public function selectInfoCustomer($idCustomer)
    {
        return DB::getRow("SELECT * FROM `".$this->nameDB."` WHERE id_customer = ? ", $idCustomer);
    }
}