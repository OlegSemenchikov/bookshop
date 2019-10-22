<?php
namespace Models\Author;

class Author
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