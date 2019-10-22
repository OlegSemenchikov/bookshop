<?php

namespace Models\Customer;

class Customer
{
    protected $name;

    public function setName($str)
    {
        $this->name = $str;
    }

    public function getName()
    {
        return $this->name ;
    }
}