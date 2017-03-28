<?php 

namespace App\Views;

class LoginFormView extends View {
	public function render() {
		extract($this->data);
		$page = 'Login';
		$page_title = "Login";
		$page_dec = "This is the Log in Page";
		include "pages/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		require "pages/login.inc.php";
	}
}

