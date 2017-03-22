<?php
namespace App\Controllers;

use App\Views\BlogView;
use App\Views\BlogCreateView;

//Used in routes.php and extends on the template from App/Controllers/Controller.php
class BlogController extends Controller {
	//This function name must match the one in your routes
	public function show() {
		//Tell php what view you want to open
		$view = new BlogView();
		$view->render();
	}

	public function create() {
		$view = new BlogCreateView();
		$view->render();
	}

	public function store() {
		


		$view = new BlogView();
		$view->render();
	}
}