<?php
namespace Models\Author;

class Author
{
    protected $surname;
    protected $name;
    protected $patronymic;

    public function setId($str)
    {
        $this->id = $str;
    }

    public function getId()
    {
        return $this->id ;
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
        return $this->patronymic ;
    }
}