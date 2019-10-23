<?php

namespace Controllers;

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
}