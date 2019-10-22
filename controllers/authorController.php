<?php

namespace Controllers;

use Models\Author\Author;
use System\View;
use Models\Author\authorService;

class authorController
{
    public $objAuthor;
    public $authorSer;

    public function actionAll()
    {
        $this->authorSer= new authorService();
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
        if(isset($_POST['surname'])&&($_POST['surname'] != '')) {

            $this->objAuthor= new Author();
            $this->authorSer= new authorService();

            $surname = $_POST['surname'];
            $this->objAuthor->setSurname($surname);
            $data["id"] = $this->authorSer->createNewAuthor($this->objAuthor);

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