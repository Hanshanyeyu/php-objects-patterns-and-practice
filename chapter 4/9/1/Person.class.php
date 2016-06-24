<?php 
class Person {

	private $name;
	public $age;
	private $id;

	public function __construct ( $name , $age ) {
		$this->name = $name;
		$this->age = $age;
	}

	public function setId ( $id ) {
		$this->id = $id;
	}

	function getAge(){
		return $this->age;
	}	

	function setAge($age) {
		$this->age = $age;
	}

}


$first = new Person( " Vinsom " , 40);

$second = $first;

$third = clone $first;

$first->setAge(20);

var_dump("first age :".$first->getAge());
echo "<br>";

var_dump("second age :".$second->getAge());

echo "<br>";
var_dump("third age :".$third->getAge());







