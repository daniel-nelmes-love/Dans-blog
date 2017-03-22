<?php 

namespace App\Views;

class BlogView extends View {
	public function render() {
		extract($this->data);
		$page = 'Blog';
		$page_title = "Blog";
		$page_dec = "Blog Page";
		include "pages/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		require "pages/blog.inc.php";
	}
}

