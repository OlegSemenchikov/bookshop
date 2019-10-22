<?php
namespace Models\Book;

class Book
{
    protected $title;

    public function setTitle($str)
    {
        $this->title = $str;
    }

    public function getTitle()
    {
        return $this->title ;
    }

}