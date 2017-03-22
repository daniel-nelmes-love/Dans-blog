<?php

namespace Apps\Models;

class Blog extends DatabaseModel {
	protected static $tableName = 'Blog';
	protected static $columns = ['id', 'title', 'description', 'imageName'];
	protected static $validationRules = [
		'title' => 'minlength:1,maxlength:100',
		'description' => 'minlength:10'
	];
}