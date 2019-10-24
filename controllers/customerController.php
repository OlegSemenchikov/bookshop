<?php

namespace Controllers;

use Models\Book\Book;
use Models\Customer\Customer;
use System\View;
use Models\Customer\customerService;

class customerController
{
    public function actionAll()
    {
        $customerSer= new customerService();
        $data = $customerSer->showAllCustomers();

        try {
            View::render('listCustomer', [
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

            $objCustomer= new Customer();
            $customerSer= new customerService();

            $name = $_POST['name'];
            $objCustomer->setName($name);
            $data["id"] = $customerSer->createNewCustomer($objCustomer);

            if(isset($data["id"])&&($data["id"] > 0)){
                $data["messageSuccess"] = "Покупатель успешно добавлен.";
            } else {
                $data["messageFail"] = "Произошла ошибка записи в БД.";
            }
        } elseif(isset($_POST['name'])&&($_POST['name'] == '')) {
            $data["messageFail"] = "Вы не указали ФИО покупателя.";
        }
        try {
            View::render('newCustomer', [
                'data' => $data,
            ]);
        }catch (\ErrorException $e) {
            echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
        }

    }

    public function actionInfo()
    {
        if(isset($_POST['id'])&&($_POST['id'] != '')) {
            $objCustomer = new Customer();
            $customerSer = new customerService();
            $objCustomer->setId($_POST['id']);
            $resultObjCustomer = $customerSer->showCustomer($objCustomer);
            echo json_encode($resultObjCustomer->getCustomer());
            debug($resultObjCustomer->getCustomer());
        } else{
            echo 'Неверный id покупателя.';
        }
    }

    public function actionBuyBooks()
    {
        if(isset($_POST['idCustomer'])&&($_POST['idCustomer'] != '')&&isset($_POST['arrIdBooks'])) {
            $objCustomer = new Customer();
            $customerSer = new customerService();
            $objCustomer->setId($_POST['idCustomer']);
            $resaltCheckIdCustomer = $customerSer->checkIdCustomer($objCustomer);
            if($resaltCheckIdCustomer){
                $arrIdBooks = $_POST['arrIdBooks'];
                $arrObjBooks = [];
                foreach ($arrIdBooks as $idBook){
                    $objBooks = new Book();
                    $objBooks->setId($idBook);
                    $arrObjBooks[] = $objBooks;
                }
                $objCustomer->setArrBooks($arrObjBooks);
                $resaltCheckIdBooks = $customerSer->checkIdBooks($objCustomer);

                if($resaltCheckIdBooks){
                    $messageAnswer = $customerSer->writeBooksCustomer($objCustomer);
                } else {
                    $messageAnswer = 'No Book with id found';
                }

            } else{
                $messageAnswer = 'No Customer with id = '.$_POST['idCustomer'].' found';
            }

        } else{
            $messageAnswer = 'Not enough data.';
        }
        echo json_encode($messageAnswer);
    }
}