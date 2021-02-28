<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the auto autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('Debug',3);

//Define a default route (home page)
$f3->route('GET /', function(){
    $view = new Template();
    echo $view->render('views/home.html');
});

//Define a signup route
$f3->route('GET /signup', function(){
    $view = new Template();
    echo $view->render('views/signup.html');
});

//Define a login route
$f3->route('GET /login', function(){
    $view = new Template();
    echo $view->render('views/login.html');
});

//Run fat free
$f3->run();