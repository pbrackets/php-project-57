<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());

// //подключение БД
// $envDbUrl = getenv('DATABASE_URL');
// if ($envDbUrl === false) {
//     die('Отсутствует переменная окружения DATABASE_URL');
// }
// $databaseUrl = parse_url($envDbUrl);
//
// //$databaseUrl = parse_url($_ENV['DATABASE_URL']);
// $username = $databaseUrl['user'];             // janedoe
// $password = $databaseUrl['pass'];             // mypassword
// $host     = $databaseUrl['host'];             // localhost
// $port     = $databaseUrl['port'];             // 5432
// $dbName   = ltrim($databaseUrl['path'], '/'); // mydb
// $db_table = 'users';                           // Имя Таблицы БД
//
// //формируем dsn для подключения
// $dsn = "pgsql:host=".$host.";port=".$port.";dbname=".$dbName;
// //PDO подключение к базе данных
// $db = new PDO($dsn, $username, $password);

// public function store()
// {
//     flash('Welcome Aboard!')->success();
//
//     return home();
// }


