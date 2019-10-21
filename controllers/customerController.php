<?php

namespace Controllers;

use Models\Customer;
use System\View;
use Models\customerService;

class customerController
{
    public function actionAll()
    {
        $model = new Customer();
        $customerSer = new customerService($model->getNameDB());

        $data = $customerSer->showAllcustomers();

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
            $name = $_POST['name'];

            $model = new Customer();
            $customerSer = new customerService($model->getNameDB());

            $data["id"] = $customerSer->addCustomer($name);

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