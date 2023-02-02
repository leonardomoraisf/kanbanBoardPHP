<?php

require('vendor/autoload.php');

use \App\Utils\View;
use \WilliamCosta\DatabaseManager\Database;
use \App\Http\Middleware\Queue as MiddlewareQueue;

// LOAD AMBIENT VARS
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

// DEFAULT URL
define('URL',$_ENV['URL']);

// DB INFOS
define('DB_DRIVE',$_ENV['DB_DRIVE']);
define('DB_HOST',$_ENV['DB_HOST']);
define('DB_USER',$_ENV['DB_USER']);
define('DB_PASS',$_ENV['DB_PASS']);
define('DB_NAME',$_ENV['DB_NAME']);

// DEFINE THE DB INFOS
Database::config(DB_HOST,DB_NAME,DB_USER,DB_PASS);


// DEFINE DEFAULT VALUE OF VARS 
View::init([
        'URL' => URL,
]);

// DEFINE THE MIDDLEWARE MAP
MiddlewareQueue::setMap([
        
]);

// DEFINE THE DEFAULT MIDDLEWARE MAP
MiddlewareQueue::setDefault([
        
]);

