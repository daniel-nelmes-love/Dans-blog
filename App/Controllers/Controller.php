<?php 

namespace App\Controllers;

//Template controller
class Controller {

	protected static $auth;

	public static function registerAuthService($auth) {
		self::$auth = $auth;
	}

}