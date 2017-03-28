<?php 

namespace App\Views;

class RegisterFormView extends View {
	public function render() {
		extract($this->data);
		$page = 'register';
		$page_title = "Register User";
		$page_dec = "This is where you register";
		include "pages/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		require "pages/register.inc.php";
	}
}

