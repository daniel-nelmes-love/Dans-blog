<?php 

namespace App\Views;

class Error404View extends View {
	public function render() {
		extract($this->data);
		$page = 'Error404';
		$page_title = "Error 404";
		$page_dec = "404 Page Not Found";
		include "pages/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		require "pages/Error404.inc.php";
	}
}

