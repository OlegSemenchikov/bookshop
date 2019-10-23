<?php

namespace Controllers;

use Models\Author\Author;
use System\View;
use Models\Author\authorService;

class authorController
{
    public function actionAll()
    {
        $objAuthor= new Author();
        $authorSer= new authorService();
        $data = $authorSer->showAllAuthors();

        foreach ($data as $key => $value){
            $objAuthor->setId($value['id_author']);

            //количество книг
//            $countBooks = $authorSer->showCountBooksAuthor($objAuthor);
//            $value += ['countBooks'=>$countBooks];

            //информация по книгам конкретного автора
            $arrBooks = $authorSer->showBooksAuthor($objAuthor);
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

            $objAuthor= new Author();
            $authorSer= new authorService();

            $objAuthor->setSurname($_POST['surname']);
            $objAuthor->setName($_POST['name']);
            $objAuthor->setPatronymic($_POST['patronymic']);

            $data["id"] = $authorSer->createNewAuthor($objAuthor);

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