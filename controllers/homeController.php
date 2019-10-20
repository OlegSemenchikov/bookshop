<?php

namespace Controllers;

use System\View;
use Models\News;

class homeController
{

    public function actionMain()
    {
        try {
            // Рендер главной страницы портала
            View::render('main');
        }catch (\ErrorException $e) {
            echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
        }
    }

}

