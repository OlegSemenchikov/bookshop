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

    public function showCustomer(Customer $objC)
    {
        $infoCustomer = $this->customerAdp->selectInfoCustomer($objC->getId());
        $resultCustomer = new Customer();
        $resultCustomer->setId($infoCustomer['id_customer']);
        $resultCustomer->setName($infoCustomer['surname']);
        $resultCustomer->setSurname($infoCustomer['name']);
        $resultCustomer->setPatronymic($infoCustomer['patronymic']);
        $resultCustomer->setPhone($infoCustomer['phone']);
        $resultCustomer->setArrBooks($this->customerAdp->selectBooksCustomer($objC->getId()));
        return $resultCustomer;
    }

    public function writeBooksCustomer(Customer $objC)
    {
        $arrIdRows = [];
        foreach ($objC->getArrBooks() as $book){
            $arrIdRows[] = $this->customerAdp->addBookCustomer($book->getId(), $objC->getId());
        }
        if(in_array(0, $arrIdRows)){
             $messageAns = 'Write error.';
        } else {
             $messageAns = 'The recording was successful.';
        }

        return $messageAns;
    }

    public function checkIdCustomer(Customer $objC)
    {
        $arrCustomers = $this->customerAdp->selectAllCustomers();

        $verificResponse = false;

        foreach ($arrCustomers as $customer){
            if($customer['id_customer'] == $objC->getId()) {
                $verificResponse = true;
                break;
            }
        }

        return $verificResponse;
    }

    public function checkIdBooks(Customer $objC)
    {
        $arrBooks = $this->customerAdp->selectAllIdBooks();
        $arrIdBooksFromBD = [];

        foreach($arrBooks as $book){
            $arrIdBooksFromBD[] = $book['id_book'];
        }

        $verificResponse = false;

        foreach ($objC->getArrBooks() as $objbook){
            if(in_array($objbook->getId(), $arrIdBooksFromBD)) {
                $verificResponse = true;
            } else {
                $verificResponse = false;
                break;
            }
        }

        return $verificResponse;
    }

}