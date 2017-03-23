<?php 

//This is where al lthe background stuff runs to get our home page to load and show

namespace App\Controllers;

use App\Views\AboutMeView;

//This name must match the one in your routes
class AboutMeController extends Controller {
	//This function name must match the one in your routes
	public function show() {
		//Tell php what view you want to open
		$view = new AboutMeView();
		$view->render();
	}
}