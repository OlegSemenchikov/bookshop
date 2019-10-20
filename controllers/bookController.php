<?php

namespace Controllers;

use System\View;
use Models\Book;

class bookController
{

    public function actionAll()
    {
        $model = new Book();

        $data = $model->showAll();
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
            $data["id"] = $model->createBook($title);

            if(isset($data["id"])){
                $data["message_success"] = "Книга успешно добавлена.";
            } else {
                $data["message_fail"] = "Вы не указали Заголовок книги.";
            }
        } elseif(isset($_POST['title'])&&($_POST['title'] == '')) {
            $data["message_fail"] = "Вы не указали Заголовок книги.";
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