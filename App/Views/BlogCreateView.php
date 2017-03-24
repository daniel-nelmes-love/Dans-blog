<?php 

namespace App\Views;

class BlogCreateview extends View {
	public function render() {
		extract($this->data);
		$page = 'Blog Create';
		$page_title = "BlogC vreate";
		$page_dec = "Create a blog post";
		include "pages/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		require "pages/blogCreate.inc.php";
	}
}

