<?php
//This file contains all of our different pages we have in our site

//We will metion classes which are in each separate controller
//This will help the PHP know where these classes are so we dont have to write them all in here
namespace App\Controllers;

// ? is the or call on a variable if undefined
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

//Tries whatever is in the first block
try {
	switch ($page) {
		case 'home':
			$controller = new HomeController();
			$controller->show();
			break;
		
		default:
			echo "Can't find page";
			break;
	}
//Does this if nothing is found
} catch (Exception $e) {
	echo "There is an error in your routes";
}