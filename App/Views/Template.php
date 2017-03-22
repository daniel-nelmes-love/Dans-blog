<?php 

namespace App\Views;

class HomeView extends View {
	public function render() {
		extract($this->data);
		$page = 'Home';
		$page_title = "Home";
		$page_dec = "This is the Home Page";
		include "pages/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		require "pages/home.inc.php";
	}
}

