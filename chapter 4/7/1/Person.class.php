<?php 
class Person {

	public $name = "Jackson";
	private $name = "Jimmy";

	function __get ( $property ) {

		$method = "get{$property}";
		if( method_exists( $this , $method ) ){
			return $this->$method();
		}
	}

	function getName ( ) {
		return "Hankin";
	}

	function getAge ( ) {
		return 44;
	}


}

$person = new Person();
var_dump( $person->name );


