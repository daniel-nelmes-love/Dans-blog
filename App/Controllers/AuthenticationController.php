<?php 

namespace App\Controllers;

use App\Views\RegisterFormView;
use App\Views\LoginFormView;
use App\Models\User;

//Template controller
class AuthenticationController extends controller {
	public function register() {
		$user = $this->getUserFormData();
		$view = new RegisterFormView(['user'=>$user]);
		$view -> render();
	}

	public function store() {
		$user = new User($_POST);
		if (! $user->isValid()) {
			$_SESSION['user.form'] = $user;
			header("Location: .\?page=Register");
			exit();
		}
		$user->save();
		header('Location: .\?page=Login');
	}

	public function login() {
		$user = $this->getUserFormData();
		$view = new LoginFormView(['user' => $user]);
		$view->render();
	}

	public function logout() {
		static::$auth->logOut();
		header('Location: ./');
		exit();
	}

	public function attempt() {
		if (static::$auth->attempt($_POST['email'], $_POST['password'])) {
			//Login successful
			header('Location: ./');
			exit();
		}
		header('Location: .\?page=Login&error=true');
		exit();
	}

	protected function getUserFormData($id = null) {
		if (isset($_SESSION['user.form'])) {
			$user = $_SESSION['user.form'];
			unset($_SESSION['user.form']);
		} else {
			$user = new User("id");
		}
		return $user;
	}
}