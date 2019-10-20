<?php

namespace System;


class App
{
    public static function run()
    {
        // Получаем URL запроса
        $path = $_SERVER['REQUEST_URI'];
        // Разбиваем URL на части
        $pathParts = explode('/', $path);

        // Получаем имя контроллера
        if($pathParts[1] != ''){
            $controller = $pathParts[1];
        } else {
            $controller = 'home';
        }

        // Получаем имя действия
        if(isset($pathParts[2])){
            $action = $pathParts[2];
        } else {
            $action = 'main';
        }

        // Формируем пространство имен для контроллера
        $controller = 'controllers\\' . $controller . 'Controller';
        // Формируем наименование действия
        $action = 'action' . ucfirst($action);

        // Если класса не существует, выбрасывем исключение
        if (!class_exists($controller)) {
            throw new \ErrorException('Controller does not exist');
        }
        
        // Создаем экземпляр класса контроллера
        $objController = new $controller;
        
        // Если действия у контроллера не существует, выбрасываем исключение
        if (!method_exists($objController, $action)) {
            throw new \ErrorException('action does not exist');
        }
        
        // Вызываем действие контроллера
        $objController->$action();
    }
}

