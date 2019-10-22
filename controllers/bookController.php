<?php

namespace Controllers;

use System\View;
use Models\Book\bookService;


class bookController
{
    protected $bookSer;

    function __construct()
    {
        $this->bookSer= new bookService();
    }

    public function actionAll()
    {
        $data = $this->bookSer->showAllBooks();

        try {
            View::render('listBooks', [
                'data' => $data,
            ]);
        }catch (\ErrorException $e) {
            echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
        }

    }

    public function actionCreate()
    {
        $data = [];
        if(isset($_POST['title'])&&($_POST['title'] != '')) {
            $title = $_POST['title'];

            $data["id"] = $this->bookSer->createNewBook($title);

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