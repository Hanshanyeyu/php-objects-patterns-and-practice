<?php 

/**
 *	final 只可定义类和方法 ,不可定义属性
 *  被 final 定义的类和方法可被继承到子类,但是不能被重写
 */
class ShopProduct {

	final function getName(){
		return "Shop Proudct";
	}
}

class BookProduct extends ShopProduct {

	// Cannot override final method ShopProduct::getName()

	// function getName(){
	// 		return "Book Proudct";
	// }
}


$shopProduct = new ShopProduct();
$bookProduct = new BookProduct();

echo $shopProduct->getName()."<br>";

echo $bookProduct->getName();