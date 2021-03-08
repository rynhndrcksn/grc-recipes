<?php
/*
 * @author: Patrick Dang & Ryan Hendrickson
 * @version: https://github.com/rynhndrcksn/grc-recipes
 * index.php contains the routes/startup info for our F3 MVC
 */

// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// required files
require_once('vendor/autoload.php');
// DB login info for PDO
require $_SERVER['DOCUMENT_ROOT'] . "/../includes/config.php";

// start our session
session_start();

// instantiate classes
$f3 = Base::instance();
//$dataLayer = new DataLayer($dbh); // $dbh is from the config.php we required ^
//$validator = new Validate($dataLayer);
//$controller = new Controller($f3);

// F3 debugging
$f3->set('Debug',3);

// route to homepage
$f3->route('GET /', function(){
    $view = new Template();
    echo $view->render('views/home.html');
});

// route to sign up page
$f3->route('GET /signup', function(){
    $view = new Template();
    echo $view->render('views/signup.html');
});

// route to login page
$f3->route('GET /login', function(){
    $view = new Template();
    echo $view->render('views/login.html');
});

//Run fat free
$f3->run();