<?php

namespace Controllers;

use System\View;
use Models\Author\authorService;

class authorController
{
    protected $authorSer;

    function __construct()
    {
        $this->authorSer= new authorService();
    }

    public function actionAll()
    {
        $data = $this->authorSer->showAllAuthors();

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

            $data["id"] = $this->authorSer->createNewAuthor($name);

            if(isset($data["id"])&&($data["id"] > 0)){
                $data["messageSuccess"] = "Автор успешно добавлен.";
            } else {
                $data["messageFail"] = "Произошла ошибка записи в БД.";
            }
        } elseif(isset($_POST['name'])&&($_POST['name'] == '')) {
            $data["messageFail"] = "Вы не указали ФИО автора.";
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