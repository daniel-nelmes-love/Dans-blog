<?php 

namespace App\Views;

class singleBlogPostView extends View {
	public function render() {
		extract($this->data);
		$page = 'blogPost';
		$page_title = "$blogPost->title";
		$page_dec = "";
		include "pages/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		require "pages/singleblogpost.inc.php";
	}
}

