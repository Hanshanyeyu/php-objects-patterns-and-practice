<?php 

/*
 *  PHP 对象介绍
 *
 */
 class ShopProduct{
 	const SHOPNAME = "Zongsheng Shop";

 	public function __toString(){
 		return "Class Shop Product";
 	}
}

$product1 = new ShopProduct();
$product2 = new ShopProduct();

$product3 = &$product1;
$product1 = new ShopProduct();

var_dump($product1);
var_dump($product2);
var_dump($product3);


/*
 * 如果两个对象的属性和属性值都相等，而且两个对象是同一个类的实例，那么这两个对象变量相等
 *
 *
 */
echo ' $product1 == $product2 : <br>';
var_dump($product1 == $product2);

echo '<br>';


/*
 * 如果两个对象的属性和属性值都相等，而且两个对象是同一个类的实例，那么这两个对象变量相等
 */
echo ' $product1 === $product2 : <br>';
var_dump($product1 === $product2);


/*
 * 如果两个对象的属性和属性值都相等，而且两个对象是同一个类的实例，那么这两个对象变量相等
 */
echo ' $product1 === $product3 : <br>';
var_dump($product1 === $product3);