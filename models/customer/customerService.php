<?php

namespace Models\Customer;

class customerService
{
    protected $customerAdp;

    function __construct()
    {
        $this->customerAdp = new adapterCustomer();
    }
    public function showAllCustomers()
    {
        $arrBooks = $this->customerAdp->selectAllCustomers();

        return $arrBooks;
    }

    public function createNewCustomer($name)
    {
        $idNewBook = $this->customerAdp->addCustomer($name);

        return $idNewBook;
    }
}