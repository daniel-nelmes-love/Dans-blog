<?php 

namespace App\Controllers;

use App\Views\Error404View;
//Template controller
class ErrorController extends Controller {
	public function Error404() {
		$view = new Error404View();
		$view->render();
	}
}