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
        $arrCustomers = $this->customerAdp->selectAllCustomers();

        return $arrCustomers;
    }

    public function createNewCustomer(Customer $objC)
    {
        $idNewCustomer = $this->customerAdp->addCustomer($objC->getName());

        return $idNewCustomer;
    }
}