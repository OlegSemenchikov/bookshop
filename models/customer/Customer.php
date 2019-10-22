<?php

namespace Models\Customer;

class Customer
{
    protected $surname;
    protected $name;
    protected $patronymic;
    protected $phone;


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
}