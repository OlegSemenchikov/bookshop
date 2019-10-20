<?php

namespace Controllers;

use System\View;

class adminController
{
    public function actionMain($data_arr = []){

        try {
            View::render('admin', [
                'data' => $data_arr,
            ]);
        }catch (\ErrorException $e) {
            echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
        }
    }
    public function actionLogin(){
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            $login = $_POST['login'];
            $password =$_POST['password'];

            /*
            Производим аутентификацию, сравнивая полученные значения со значениями прописанными в коде.
            Такое решение не верно с точки зрения безопсаности и сделано для упрощения примера.
            Логин и пароль должны храниться в БД, причем пароль должен быть захеширован.
            */
            if($login=="admin" && $password=="12345"){
                $data["login_status"] = "access_granted";
                session_start();
                $_SESSION['admin'] = $login;

                try {
                    View::render('admin', [
                        'data' => $data,
                    ]);
                }catch (\ErrorException $e) {
                    echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
                }
            } else {
                $data["login_status"] = "access_denied";
                $this->actionMain($data);
            }
        }
        else
        {
            $data["login_status"] = "";
            $this->actionMain($data);
        }


    }
}