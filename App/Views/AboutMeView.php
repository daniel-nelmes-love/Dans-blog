<?php 

namespace App\Views;

class AboutMeView extends View {
	public function render() {
		extract($this->data);
		$page = 'About Me';
		$page_title = "About Me";
		$page_dec = "Some stuff about me";
		include "pages/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		require "pages/aboutMe.inc.php";
	}
}

