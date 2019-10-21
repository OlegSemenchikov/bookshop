<?php
// Включаем режим строгой типизации
declare(strict_types=1);

use System\View;

require_once __DIR__ . '/system/Dev.php';

// Подключаем файл реализующий автозагрузку
require_once __DIR__ . '/system/autoload.php';

// Запускаем приложение
try {
    System\App::run();
}catch (\ErrorException $e) {
    View::render('404');
    echo '<p>Извините, произошла ошибка: ',  $e->getMessage(), ".</p>\n";
}