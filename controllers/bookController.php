<?php

namespace Controllers;

use Models\Book\Book;
use System\View;
use Models\Book\bookService;


class bookController
{
    public function actionAll()
    {
        $objBook= new Book();
        $bookSer= new bookService();
        $data = $bookSer->showAllBooks();

        foreach ($data as $key => $value){
            $objBook->setId($value['id_book']);
            $arrAuth = $bookSer->showAuthorsBook($objBook);
            $value += ['arrAuth'=>$arrAuth];
            $data[$key] = $value;
        }

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
            $objBook= new Book();
            $bookSer= new bookService();

            $idBook = $_POST['id'];
            $objBook->setId($idBook);
            $data = $bookSer->editBook($objBook);
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

            $objBook= new Book();
            $bookSer= new bookService();

            $objBook->setId($_POST['id']);
            $objBook->setTitle($_POST['title']);
            $objBook->setPages($_POST['pages']);
            $objBook->setYear($_POST['year']);
            $objBook->setPrice($_POST['price']);

            $data["idBook"] = $bookSer->saveBook($objBook);

            if(isset($data["idBook"])&&($data["idBook"] > 0)){
                $data = $bookSer->showAllBooks();

                foreach ($data as $key => $value){
                    $objBook->setId($value['id_book']);
                    $arrAuth = $bookSer->showAuthorsBook( $objBook);
                    $value += ['arrAuth'=>$arrAuth];
                    $data[$key] = $value;
                }

                $data["messageSuccess"] = "Книга успешно одновлена.";
                try {
                    View::render('listBooks', [
                        'data' => $data,
                    ]);
                }catch (\ErrorException $e) {
                    echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
                }
            } else {
                $data["messageFail"] = "Произошла ошибка записи в БД. Повторите попытку.";
                try {
                    View::render('editBook', [
                        'data' => $data,
                    ]);
                }catch (\ErrorException $e) {
                    echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
                }
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

            $objBook= new Book();
            $bookSer= new bookService();

            $title = $_POST['title'];
            $objBook->setTitle($title);
            $objBook->setPages($_POST['pages']);
            $objBook->setYear($_POST['year']);
            $objBook->setPrice($_POST['price']);
            $data["id"] = $bookSer->createNewBook($objBook);

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