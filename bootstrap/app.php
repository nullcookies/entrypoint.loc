<?php


define("BASEPATH",dirname(__DIR__));
define("BOOTSTRAP", "twbs/bootstrap/dist/");
define("JQUERY","components/jquery/");
define("POPPER","components/popper/node_modules/popper.js/dist/umd/");

$app = \App\System\App::getInstance(BASEPATH);

$config = new \App\System\Config\Config('config');
$config->addConfig('database.yaml'); 

$app->add('config', $config);

$database = $config->get('database');

// try
// {
// $link = new PDO("mysql:host=".$database['host'].";dbname=".$database['dbname'], $database['user'], $database['password']);
// }
// catch (PDOException $e) 
// {
//     dump('Подключение не удалось: ', $e->getMessage());
// }
$db = new \App\System\Database;
$link = $db::connect($database['host'], $database['bdname'], $database['user'], $database['password']);
// dd($config->get('database'));
return $app;