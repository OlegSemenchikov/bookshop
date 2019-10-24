<?php

namespace Models\Customer;

class Customer
{
    protected $idCustomer;
    protected $surname;
    protected $name;
    protected $patronymic;
    protected $phone;
    protected $arrBooks;


    public function setId($str)
    {
        $this->idCustomer = $str;
    }

    public function getId()
    {
        return $this->idCustomer ;
    }

    public function setName($str)
    {
        $this->name = $str;
    }

    public function getName()
    {
        return $this->name ;
    }

    public function setSurname($str)
    {
        $this->surname = $str;
    }

    public function getSurname()
    {
        return $this->surname ;
    }

    public function setPatronymic($str)
    {
        $this->patronymic = $str;
    }

    public function getPatronymic()
    {
        return $this->patronymic;
    }

    public function setPhone($str)
    {
        $this->phone = $str;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setArrBooks(array $arrObjBooks)
    {
        $this->arrBooks = $arrObjBooks;
    }

    public function getArrBooks()
    {
        return $this->arrBooks ;
    }

    public function getCustomer()
    {
        $Customer = array('idCustomer' => $this->getId(),
                          'surname' => $this->getSurname(),
                          'name' => $this->getName(),
                          'patronymic' => $this->getPatronymic(),
                          'phone' => $this->getPhone(),
                          'arrBooks' => $this->getArrBooks(),
                          );

        return $Customer ;
    }
}