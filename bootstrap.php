<?php
/**
 * This file bootstraps the application
 */

// include the configuration from the .env file
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

//INIT THE DATABASE
include_once __DIR__."/resource/database.php";
$database = new db();
$db = $database->connect();

// Error reporting if state is development
if (getenv('APP_STATE') == 'development' && getenv('APP_STATE') != 'production'){
   error_reporting(3);    
}else{
    error_reporting(0);    
}


//include the models
include_once __DIR__."/Controllers/Controller.php";
foreach (glob(__DIR__."/Controllers/*.php") as $filename)
{
//    echo $filename;
    include_once $filename;
}
//include the Notifications
foreach (glob(__DIR__."/Notifications/*.php") as $filename)
{
//    echo $filename;
    include_once $filename;
}

//include the controllers
include_once __DIR__."/Models/Model.php";
foreach (glob(__DIR__."/Models/*.php") as $filename)
{
    include_once $filename;
}

require_once __DIR__."/vendor/pecee/simple-router/helpers.php";

use Pecee\SimpleRouter\SimpleRouter as Router;

//include routes
include_once __DIR__.'/routes.php';

/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */

Router::setDefaultNamespace('Controllers');

// Start the routing
Router::start();
