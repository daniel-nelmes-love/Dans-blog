<?php
//This file contains all of our different pages we have in our site

//We will metion classes which are in each separate controller
//This will help the PHP know where these classes are so we dont have to write them all in here
namespace App\Controllers;
use App\Models\exceptions\ModelNotFoundException;

// ? is the or call on a variable if undefined
$page = isset($_GET['page']) ? $_GET['page'] : 'Home';

//Tries whatever is in the first block
try {
	switch ($page) {
		case 'Home':
			$controller = new HomeController();
			$controller->show();
			break;

		case 'Blog':
			$controller = new BlogController();
			$controller->show();
			break;

		case 'blog.create':
			$controller = new BlogController();
			$controller->create();
			break;

		case 'blog.store':
			$controller = new BlogController();
			$controller->store();
			break;

		case 'blog.post':
			$controller = new BlogController();
			$controller->singleBlogPost();
			break;

		case 'blog.edit':
			$controller = new BlogController();
			$controller->edit();
			break;

		case 'blog.update':
			$controller = new BlogController();
			$controller->update();
			break;

		case 'blog.remove':
			$controller = new BlogController();
			$controller->remove();
			break;

		case 'About Me':
			$controller = new AboutMeController();
			$controller->show();
			break;

		case 'Contact Me':
			$controller = new ContactMeController();
			$controller->update();
			break;

		case 'Register':
			$controller = new AuthenticationController();
			$controller->register();
			break;

		case 'auth.store':
			$controller = new AuthenticationController();
			$controller->store();
			break;

		case 'Login':
			$controller = new AuthenticationController();
			$controller->login();
			break;

		case 'auth.attempt':
			$controller = new AuthenticationController();
			$controller->attempt();
			break;



		case 'logout':
			$controller = new AuthenticationController();
				$controller->logout();
			break;

		// case 'Login':
		// 	$controller = new AuthenticationController();
		// 	break;
		
		default:
			throw new ModelNotFoundException();
			break;
	}
//Does this if nothing is found
} catch (ModelNotFoundException $e) {
	$controller = new ErrorController();
	$controller->Error404();
}