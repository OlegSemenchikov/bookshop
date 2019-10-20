<?php
// Включаем режим строгой типизации
declare(strict_types=1);

require_once __DIR__ . '/system/Dev.php';

// Подключаем файл реализующий автозагрузку
require_once __DIR__ . '/system/autoload.php';

// Запускаем приложение
System\App::run();