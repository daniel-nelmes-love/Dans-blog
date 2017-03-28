<?php

namespace App\Models;



class User extends DatabaseModel {
	protected static $tableName = 'Users';
	protected static $columns = ['id', 'name', 'email', 'password', 'role'];
	protected static $validationRules = [
		'name' => 'minlength:1,maxlength:255',
		'email' => 'email,unique:App\Model\User',
		'password' => 'minlength:6'
	];

	function __construct($input = null) {
		parent::__construct($input);
		if ($this->role === null) {
			$this->role = 'user';
		}
	}

}