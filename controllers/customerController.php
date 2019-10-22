<?php

namespace Controllers;

use System\View;
use Models\Customer\customerService;

class customerController
{
    protected $customerSer;

    function __construct()
    {
        $this->customerSer= new customerService();
    }

    public function actionAll()
    {
        $data = $this->customerSer->showAllCustomers();

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

            $data["id"] = $this->customerSer->createNewCustomer($name);

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