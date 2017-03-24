<?php

//Set the default timezone
date_default_timezone_set("Pacific/Auckland");

//Tell the project we want to see all the errors
error_reporting(E_ALL);

//Autoload does all of the grunt work for loading files, makes it faster
//Will always use it as it is required. Installed through terminals "composer install" line
require 'vendor/autoload.php';

//Need to turn on sessions
session_start();
session_regenerate_id(true);

//Routes tell us which page/function is being loaded and what to load
require 'routes.php';

// Test the connection
// require 'databaseTest.php';