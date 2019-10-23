<?php

namespace Models\Book;

class bookService
{
    protected $bookAdp;

    function __construct()
    {
        $this->bookAdp = new adapterBook();
    }
    public function showAllBooks()
    {
        $arrBooks = $this->bookAdp->selectAllBooks();

        return $arrBooks;
    }

    public function createNewBook(Book $objB)
    {
        $idNewBook = $this->bookAdp->addBook($objB->getTitle(), $objB->getPages(), $objB->getYear(), $objB->getPrice());

        return $idNewBook;
    }

    public function editBook(Book $objB)
    {
        $Book = $this->bookAdp->selectBook($objB->getId());

        return $Book;
    }

    public function saveBook(Book $objB)
    {
        $idNewBook = $this->bookAdp->updateBook($objB->getId(), $objB->getTitle(), $objB->getPages(), $objB->getYear(), $objB->getPrice());

        return $idNewBook;
    }
}