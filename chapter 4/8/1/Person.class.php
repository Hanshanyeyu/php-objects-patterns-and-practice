<?php 
class Person {

	private $name;
	private $age;
	private $id;

	public function __construct ( $name , $age ) {
		$this->name = $name;
		$this->age = $age;
	}

	public function setId ( $id ) {
		$this->id = $id;
	}

	function __destruct ( ) {
		var_dump( $this->name );
		if ( ! empty( $this->id ) ) {
			print " saving person  <br>";
		}
	}

}

$person = new Person( "Tony" , 44 );
$person->setId (343 ) ;
unset ( $person  ) ;


