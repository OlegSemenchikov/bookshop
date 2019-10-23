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
        $arrAuthors = $this->authorAdp->selectAllAuthors();

        return $arrAuthors;
    }

    public function createNewAuthor(Author $objA)
    {
        $idNewAuthor = $this->authorAdp->addAuthor($objA->getSurname(), $objA->getName(), $objA->getPatronymic());

        return $idNewAuthor;
    }

    public function showCountBooksAuthor(Author $objA)
    {
        $countBooks = $this->authorAdp->getCountBooks($objA->getId());

        return $countBooks;
    }
}