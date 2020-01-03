<?php

define("BASEPATH",dirname(__DIR__));
define("BOOTSTRAP", "twbs/bootstrap/dist/");
define("JQUERY","components/jquery/");
define("POPPER","components/popper/node_modules/popper.js/dist/umd/");

$app = \App\System\App::getInstance(BASEPATH);

// $config = new \App\System\Config\Config('config');
// $config->addConfig('database.yaml'); 

// $app->add('config', $config);

//dd($config->get('database.dbname'));
return $app;