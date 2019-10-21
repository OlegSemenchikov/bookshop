<?php

namespace Controllers;

use System\View;
use Models\Book;
use Models\bookService;


class bookController
{

    public function actionAll()
    {
        $model = new Book();
        $bookSer = new bookService($model->getNameDB());

        $data = $bookSer->showAllBooks();

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

            $model = new Book();
            $bookSer = new bookService($model->getNameDB());

            $data["id"] = $bookSer->addBook($title);

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