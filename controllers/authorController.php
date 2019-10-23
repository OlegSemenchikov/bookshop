<?php

namespace Controllers;

use Models\Author\Author;
use System\View;
use Models\Author\authorService;

class authorController
{
    public function actionAll()
    {
        $this->objAuthor= new Author();
        $this->authorSer= new authorService();
        $data = $this->authorSer->showAllAuthors();

        foreach ($data as $key => $value){
            $this->objAuthor->setId($value['id_author']);

            //количество книг
//            $countBooks = $this->authorSer->showCountBooksAuthor($this->objAuthor);
//            $value += ['countBooks'=>$countBooks];

            //информация по книгам конкретного автора
            $arrBooks = $this->authorSer->showBooksAuthor($this->objAuthor);
            $value += ['arrBooks'=>$arrBooks];

            $data[$key] = $value;
        }


        echo json_encode($data);
//        debug($data);
//        try {
//            View::render('listAuthor', [
//                'data' => $data,
//            ]);
//        }catch (\ErrorException $e) {
//            echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
//        }

    }

    public function actionCreate()
    {
        $data = [];
        if(isset($_POST['surname'])&&($_POST['surname'] != '')) {

            $this->objAuthor= new Author();
            $this->authorSer= new authorService();

            $this->objAuthor->setSurname($_POST['surname']);
            $this->objAuthor->setName($_POST['name']);
            $this->objAuthor->setPatronymic($_POST['patronymic']);

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