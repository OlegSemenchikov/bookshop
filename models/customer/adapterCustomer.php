<?php

namespace Models\Customer;

use System\DB;

class adapterCustomer
{
    protected $nameDBCustomers;
    protected $nameDBBooks;
    protected $nameDBBooksCustomers;



    function __construct()
    {
        $this->nameDBCustomers = 'customer';
        $this->nameDBBooks = 'book';
        $this->nameDBBooksCustomers = 'book_customer';


    }

    public function selectAllCustomers()
    {
        return DB::getAll("SELECT * FROM `".$this->nameDBCustomers."`");
    }

    public function addCustomer($name)
    {
        return DB::add("INSERT INTO `".$this->nameDBCustomers."` SET `name` = ?", $name);
    }

    public function selectBooksCustomer($idCustomer)
    {
        return DB::getAll("SELECT b_c.id_book, b.title, b.pages, b.year, b.price FROM ".$this->nameDBBooksCustomers." AS b_c LEFT JOIN ".$this->nameDBBooks." AS b ON b_c.id_book = b.id_book WHERE b_c.id_customer = ? ORDER BY b.title", $idCustomer);
    }

    public function selectInfoCustomer($idCustomer)
    {
        return DB::getRow("SELECT * FROM `".$this->nameDBCustomers."` WHERE id_customer = ? ", $idCustomer);
    }

    public function addBookCustomer($idBook, $idCustomer)
    {
        return DB::add("INSERT INTO `".$this->nameDBBooksCustomers."` SET `id_book` = ?, `id_customer` = ?", array($idBook, $idCustomer));
    }

    public function selectAllIdBooks()
    {
        return DB::getAll("SELECT `id_book` FROM `".$this->nameDBBooks."`");
    }
}