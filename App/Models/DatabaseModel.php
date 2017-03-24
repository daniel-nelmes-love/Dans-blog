<?php

namespace App\Models;

//PHP dat object - a php library to connect with databases
use PDO;

abstract class DatabaseModel {
	public $data = [];
	public $errors = [];
	protected static $columns = [];
	private static $db;

	// Create the Object an whats needed to construct it
	public function __construct($input = null) {
		//If in the model there are columns
		if (static::$columns) {
			foreach (static::$columns as $column) {
				$this->$column = null;
				$this->errors[$column] = null;
			}
		}

		//Find to see if there is a database entry
		if (is_integer($input)&&$input > 0) {
			$this->find($input);
		}

		if (is_array($input)) {
			//If there is something in the var $input
			$this->processArray($input);
		}
	}

	//Create a function which connects to the database
	protected static function getDatabaseConnection() {
		//Self refers to if the current class
		if (!self::$db) {
			$dsn = 'mysql:host=localhost;dbname=Dans_Blog;charset:utf8';
			self::$db = new PDO($dsn, 'root', '');
			self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		return self::$db;
	}

	//Process all of the columns and add the relevant data to it
	public function processArray($input) {
		foreach (static::$columns as $column) {
			if (isset($input[$column])) {
				$this->$column = $input[$column];
			}
		}
	}

	public function __get($name) {
		if (in_array($name, static::$columns)) {
			return $this->data[$name];
		}
	}
	public function __set($name, $value) {
		if (!in_array($name, static::$columns)) {
			// Error
		}
		$this->data[$name] = $value;
	}

	//Function to validate all the columns
	public function isValid() {
		$valid = true;
		//Loop through all of the validation rules in th model
		foreach (static::$validationRules as $column => $rules) {
			//At the beginning there are no errors
			$this->errors[$column] = null;
			//Separate all of the rules
			$rules = explode(',', $rules);
			//Loop over each of the different rules for each column
			foreach ($rules as $rule) {
				if (strstr($rule, ":")) {
					//If the rule has a value then split it
					$rule = explode(':', $rule);
					//Put the value into a value variable
					$value = $rule[1];
					//Put the rule back into the rule variable
					$rule = $rule[0];
				}
				switch ($rule) {
					case 'minlength':
						if (strlen($this->$column) < $value) {
							$valid = false;
							$this->errors[$column] = "Too short - must be at least $value long";
						}
						break;

					case 'maxlength':
						if (strlen($this->$column) > $value) {
							$valid = false;
							$this->errors[$column] = "Too long - cannot be more than $value long";
						}
						break;
					
				}
			}
		}
		return $valid;
	}

	public function save() {
		//Get connection to db
		$db = static::getDatabaseConnection();
		//Find columns from the model
		$columns = static::$columns;

		//because ID is AI we don't want to put a value in it
		unset($columns[array_search('id', $columns)]);
		unset($columns[array_search('timeStamp', $columns)]);

		// Create an insert query which is linked to the database
		$query = 'INSERT INTO '. static::$tableName . ' (' . implode(',', $columns) . ') VALUES (';

		$insertCols = [];
		//For each of the columns in the column array, add that column into the instertCols array and separate them with a :
		foreach ($columns as $column) {
			array_push($insertCols, ':' . $column);
		}

		//Turn the insert cols array into 1 string with a comma between entry
		$query .= implode(',', $insertCols);
		//Close the query
		$query .= ')';

		//Prepare the query
		$statement = $db->prepare($query);

		//Foreach of the columns run this function
		foreach ($columns as $column) {
			//Attach the value to each of the columns
			$statement->bindValue(':'.$column, $this->$column);
		}

		//Run the query
		$statement->execute();

		//Get the id of the query which was just added
		$this->id = $db->lastInsertID();
	}

	public function find($id) {
		$db = static::getDatabaseConnection();
		//Create a select query
		$query = 'SELECT '.implode(',', static::$columns).' FROM '.static::$tableName.' WHERE id = :id';
		//prepare the query
		$statement = $db->prepare($query);
		//Find the column with id
		$statement->bindValue(':id', $id);
		$statement->execute();

		//Put the associated row into a var
		$record = $statement->fetch(PDO::FETCH_ASSOC);

		//Put the record into the data variable
		$this->data = $record;
	}
}







