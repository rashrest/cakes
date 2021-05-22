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
$f3->route('GET|POST /', function($f3){
    $userFlavors = array();
    $userName = "";


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userFlavors = $_POST['flavor'];
        $userName = $_POST['name'];

        if(validFlavor($userFlavors)){
            $_SESSION['flavors'] = $userFlavors;
        }
        //Otherwise, set an error variable in the hive
        else{
            $f3->set('errors["flavors"]', "Please select at least one flavor.");
        }
        if(validName($userName)){

            $_SESSION['name'] = $userName;
        }
        else{
            $f3->set('errors["name"]','Please enter a name.');
        }
        if(empty($f3->get('errors'))){
            header('location: summary');
        }
    }

    //get data from the model
    $f3->set("flavors",getFlavors());
    $f3->set("userFlavors",$userFlavors);

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /summary', function(){

    //Display the summary page
    $view = new Template();
    echo $view->render('views/summary.html');
});




//Run Fat-Free
$f3->run();