<?php 

/*
 *  类中的属性   
 *  属性声明范围  public/protected/private
 *
 */
class ShopProduct{

	public $title                   = "default product";
	private $productMainName         = "main name";
	protected $productFirstName     = "first name";
	public $price                   = 0;

	 const WEIGHT			= 0.8;

}

class Food extends ShopProduct{

	public function getParentName(){
		return parent::$productMainName;
	}

	public function getFirstName(){
		return $this->productFirstName;
	}

	public function getMainName(){
		return $this->productMainName;
	}

	
}


$product1 = new ShopProduct();
$food1 = new Food();

var_dump($product1);
var_dump($food1);

// Fatal error: Cannot access private property ShopProduct::$productMainName
// Fatal error: Access to undeclared static property: ShopProduct::$productMainName
//var_dump($food1->getParentName());

// Fatal error: Cannot access private property ShopProduct::$productMainName
var_dump($food1->getFirstName());

// Undefined property: Food::$productMainName
//var_dump($food1->getMainName());


