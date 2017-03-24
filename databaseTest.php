<!-- testing the database connection -->

<?php 
	
	try {
		$test = new PDO('mysql:host=localhost;dbname=Dans_Blog;charset:utf8', 'root', '');
		$test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$test->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		var_dump('connected');
	} catch (Exception $e) {
		echo $e->getCode();
		echo "Can't connect to database", $e->getMessage();
	}

 ?>