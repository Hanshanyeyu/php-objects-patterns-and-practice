<?php 

/*
 *  PHP 类介绍
 *
 */

class ShopProduct{
 	
 	public function __toString(){
 		return "Class Shop Product";
 	}

 	// public function __construct(){
 	// 	echo "ShopProduct Construct <br>";
 	// }
}


// 通过New 生成类的对象, 对象属于Object类型
var_dump(is_object(new ShopProduct()));

var_dump(ShopProduct::class);

var_dump(Object::class);

var_dump(new ShopProduct());

// php 5.2 开始类的__toString() 方法必须自己定义
echo new ShopProduct();


