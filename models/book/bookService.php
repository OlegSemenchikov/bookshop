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

    public function createNewBook($title)
    {
        $idNewBook = $this->bookAdp->addBook($title);

        return $idNewBook;
    }
}