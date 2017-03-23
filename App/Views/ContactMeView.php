<?php 

namespace App\Views;

class ContactMeView extends View {
	public function render() {
		extract($this->data);
		$page = 'Contact Me';
		$page_title = "Contact Me";
		$page_dec = "Some stuff about me";
		include "pages/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		require "pages/contactMe.inc.php";
	}
}

