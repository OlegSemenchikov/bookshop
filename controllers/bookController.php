<?php

namespace Controllers;

use Models\Book\Book;
use System\View;
use Models\Book\bookService;


class bookController
{
    public $objBook;
    public $bookSer;

    public function actionAll()
    {
        $this->bookSer= new bookService();
        $data = $this->bookSer->showAllBooks();

        try {
            View::render('listBooks', [
                'data' => $data,
            ]);
        }catch (\ErrorException $e) {
            echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
        }

    }

    public function actionEdit()
    {
        if(isset($_POST['id'])&&($_POST['id'] != '')) {
            $data = [];
            $this->objBook= new Book();
            $this->bookSer= new bookService();

            $idBook = $_POST['id'];
            $this->objBook->setId($idBook);
            $data = $this->bookSer->editBook($this->objBook);
            try {
                View::render('editBook', [
                    'data' => $data,
                ]);
            }catch (\ErrorException $e) {
                echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
            }
        } else {
            $this->actionAll();
        }

    }

    public function actionSave()
    {
        $data = [];
        if(isset($_POST['title'])&&($_POST['title'] != '')) {

            $this->objBook= new Book();
            $this->bookSer= new bookService();

            $this->objBook->setId($_POST['id']);
            $this->objBook->setTitle($_POST['title']);
            $this->objBook->setPages($_POST['pages']);
            $this->objBook->setYear($_POST['year']);
            $this->objBook->setPrice($_POST['price']);

            $data = $this->bookSer->showAllBooks();

            $data["idBook"] = $this->bookSer->saveBook($this->objBook);
//            debug($data["idBook"]);
            if(isset($data["id"])&&($data["id"] > 0)){
                $data["messageSuccess"] = "Книга успешно одновлена.";
//                echo "Книга успешно одновлена.";
            } else {
                $data["messageFail"] = "Произошла ошибка записи в БД.";
//                echo "Произошла ошибка записи в БД.";
            }

            try {
                View::render('listBooks', [
                    'data' => $data,
                ]);
            }catch (\ErrorException $e) {
                echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
            }


        } elseif(isset($_POST['title'])&&($_POST['title'] == '')) {
            $data["messageFail"] = "Вы не указали Заголовок книги.";
            try {
                View::render('editBook', [
                    'data' => $data,
                ]);
            }catch (\ErrorException $e) {
                echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
            }

        }

    }

    public function actionCreate()
    {
        $data = [];
        if(isset($_POST['title'])&&($_POST['title'] != '')) {

            $this->objBook= new Book();
            $this->bookSer= new bookService();

            $title = $_POST['title'];
            $this->objBook->setTitle($title);
            $data["id"] = $this->bookSer->createNewBook($this->objBook);

            if(isset($data["id"])&&($data["id"] > 0)){
                $data["messageSuccess"] = "Книга успешно добавлена.";
            } else {
                $data["messageFail"] = "Произошла ошибка записи в БД.";
            }
        } elseif(isset($_POST['title'])&&($_POST['title'] == '')) {
            $data["messageFail"] = "Вы не указали Заголовок книги.";
        }
        try {
            View::render('newBook', [
                'data' => $data,
            ]);
        }catch (\ErrorException $e) {
            echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
        }

    }

}