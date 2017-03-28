<?php
namespace App\Controllers;

use App\Views\BlogView;
use App\Views\BlogCreateView;
use App\Views\singleBlogPostView;
use App\Models\Blog;

//Used in routes.php and extends on the template from App/Controllers/Controller.php
class BlogController extends Controller {
	//This function name must match the one in your routes
	public function show() {
		$blogs = Blog::all();
		// $blogBount = Blog::count();
		//Tell php what view you want to open
		//When parsing more than one variable the use compact('var1', 'var2', ...) without the $ signs on the variables
		$view = new BlogView(compact('blogs', 'blogCount'));
		$view->render();
	}

	public function create() {
		//Check to see if there is any data we need to fill the form with
		$blogPost = $this->getFormData();
		// var_dump($blogPost);
		// die();
		$view = new BlogCreateView(['blogPost' => $blogPost]);
		$view->render();
	}

	public function store() {
		// show $_POST
		// var_dump($_POST);

		//Create a new instance of the Model
		$blogPost = new Blog($_POST);

		//Validate form
		if (!$blogPost->isValid()) {
			//Return to the previous page
			$_SESSION['blog.create'] = $blogPost;
			header('Location:.\?page=blog.create');
			exit();
		}

		//Check to see if the image is OK
		if($_FILES['image']['error'] === UPLOAD_ERR_OK) {
			$blogPost->saveImage($_FILES['image']['tmp_name']);
		}

		//Run thesave function in the database controller
		$blogPost->save();
		//Go to that blog post
		header("Location:./?page=blog.post&id=".$blogPost->id);
	}

	public function singleBlogPost() {
		//Get the relevant blog post based on id
		$blogPost = new Blog((int)$_GET['id']);
		$view = new singleBlogPostView(['blogPost'=>$blogPost]);
		$view->render();
	}

	public function getFormData($id = null) {
		if (isset($_SESSION['blog.create'])) {
			$blogpost = $_SESSION['blog.create'];
			unset($_SESSION['blog.create']);
		} else {
			$blogpost = new Blog((int)$id);
		}
		return $blogpost;
	}

	public function edit() {
		$blogPost = $this->getFormData($_GET['id']);
		$view = new BlogCreateView(['blogPost'=>$blogPost]);
		$view->render();
	}

	public function update() {
		$blogPost = new Blog((int)$_GET['id']);
		$blogPost->processArray($_POST);

		if (! $blogPost->isValid()) {
			$_SESSION['blog.create'] = $blogPost;
			header('Location: .\?page=blog.edit&id='.$_GET['id']);
			exit();
		}

		if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
			//Remove old images
			unlink('./images/originals/$blogPost->image');
			unlink('./images/thumbs/$blogPost->image');
			$blogPost->saveImage($_FILES['image']['tmp_name']);

		} else if (isset($_POST['removeImage'])&&($_POST['removeImage']==='true')) {
			$blogPost->image = null;
			unlink('./images/originals/$blogPost->image');
			unlink('./images/thumbs/$blogPost->image');
		}

		$blogPost->updateDatabase();
		header('Location: .\?page=blog.post&id=' . $blogPost->id);
	}

	public function remove() {
		$blogPost = new Blog((int)$_POST['id']);
		if (isset($blogPost->image)) {
			unlink('./images/originals/$blogPost->image');
			unlink('./images/thumbs/$blogPost->image');
		}
		Blog::DatabaseRemove($_POST['id']);
		header("Location: .\?page=Blog");
	}
}