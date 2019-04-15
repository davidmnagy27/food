<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
//require the autoload file autoload.php
require_once('vendor/autoload.php');
//Create an instance of the Base class/ instantiate Fat-Free
$f3 = Base::instance();
//Turn on Fat-free error reporting/Debugging
$f3->set('DEBUG',3);
//Define a default route (use backlash / )
$f3->route('GET /order', function() {
    //Display a view-set view as new template and echo out the view
    $view = new Template();
    echo $view->render('views/form1.html');


});

//define a continental route

$f3->route('GET /continental', function()
{

    echo "<h1> Breakfast Page</h1>";

});

    //define a breakfast route

    $f3->route('GET /breakfast', function()
    {

        echo "<h1> Breakfast Page</h1>";

});

//define a lunch route route

$f3->route('GET /lunch', function()
{

    echo "<h1> Lunch!</h1>";

});


//define a buffet route route

$f3->route('GET /buffet', function()
{

    echo "<h1> Lunch!</h1>";

});



//define a route with a parameter
$f3->route('GET /@item', function($f3,$params) {

    $item = $params['item'];


    switch ($item) {
        case 'spaghetti';
        echo "<h3> I like $item with meatballs</h3>";
        break;
        case 'pizza';
            echo "<h3> pepperoni or veggie</h3>";
            break;
            case 'tacos';
                echo "<h3> we dont Have $item </h3>";
                break;
                case 'bagel';
                    $f3->route("/breakfast/continental");
                    default;
                    $f3->error(404);


    }

    echo $params['item'];

});

//define a route with a parameter
$f3->route('GET /@first/@last', function($f3,$params)
{
    $first = $params['first'];
    $last = $params['last'];

    echo "<h3> Hello $first $last </h3>";






});


//Run fat free F3
$f3->run();