<?php

namespace Controllers;

use Models\Customer\Customer;
use System\View;
use Models\Customer\customerService;

class customerController
{
    public $objCustomer;
    public $customerSer;

    public function actionAll()
    {
        $this->customerSer= new customerService();
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

            $this->objCustomer= new Customer();
            $this->customerSer= new customerService();

            $name = $_POST['name'];
            $this->objCustomer->setName($name);
            $data["id"] = $this->customerSer->createNewCustomer($this->objCustomer);

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