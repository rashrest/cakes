<?php

//index.php

//starting session
session_start();

//This is my controller for the cakes project

//Turn on error-reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require necessary files
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});



//Run Fat-Free
$f3->run();