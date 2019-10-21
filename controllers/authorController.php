<?php

namespace Controllers;

use Models\Author;
use System\View;

class authorController
{
    public function actionAll()
    {
        $model = new Author();

        $data = $model->showAll();
        try {
            View::render('listAuthor', [
                'data' => $data,
            ]);
        }catch (\ErrorException $e) {
            echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
        }

    }

    public function actionCreate()
    {
        $data = [];
        if(isset($_POST['name'])&&($_POST['name'] != '')) {
            $name = $_POST['name'];

            $model = new Author();
            $data["id"] = $model->addAuthor($name);

            if(isset($data["id"])){
                $data["message_success"] = "Автор успешно добавлен.";
            } else {
                $data["message_fail"] = "Произошла ошибка записи в БД.";
            }
        } elseif(isset($_POST['name'])&&($_POST['name'] == '')) {
            $data["message_fail"] = "Вы не указали ФИО автора.";
        }
        try {
            View::render('newAuthor', [
                'data' => $data,
            ]);
        }catch (\ErrorException $e) {
            echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
        }

    }

}