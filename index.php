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
require_once ('model/validation.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function($f3){
    $userFlavors = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userFlavors = $_POST['flavor'];

        if(validFlavor($userFlavors)){

        }
    }

    //get data from the model
    $f3->set("flavors",getFlavors());

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});



//Run Fat-Free
$f3->run();