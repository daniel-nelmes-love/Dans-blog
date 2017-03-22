<?php 

namespace App\Views;

class HomeView extends View {
	public function render() {
		//extracts all of the data from the controller
		extract($this->data);
		$page = 'home';
		//What is the page title
		$page_title = "home";
		//What is the description of the page
		$page_dec = "This is the Home Page";
		//include the master page
		include "pages/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		// This is the home page
		require "pages/home.inc.php";
	}
}

