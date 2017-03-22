<?php 


namespace App\Views;

//Template view
abstract class View {
	//Protected variables or classes are visible only to the class which they belong to and any subclass
	protected $data;

	//This is saying that they need something to construct the function
	//ie, you need wood
	public function __construct($data=[]){
		$this->data = $data;
	}

	abstract public function render();
}

