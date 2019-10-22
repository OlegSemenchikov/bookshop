<?php

namespace Models\Author;

class authorService
{
    protected $authorAdp;

    function __construct()
    {
        $this->authorAdp = new adapterAuthor();
    }
    public function showAllAuthors()
    {
        $arrBooks = $this->authorAdp->selectAllAuthors();

        return $arrBooks;
    }

    public function createNewAuthor($name)
    {
        $idNewBook = $this->authorAdp->addAuthor($name);

        return $idNewBook;
    }
}