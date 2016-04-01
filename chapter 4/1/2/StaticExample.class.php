<?php 

/**
 *
 *	继承该类的对象也与类同时共享属性
 *	
 *
 */

class StaticExample {

	static public $aNum = 0;

	static public function sayHello() {
		self::$aNum ++;
		print "hello (".self::$aNum.") <br> "; 
	}
}

class StaticExampleSon extends StaticExample{

	// 静态方法是可以被重写的
	static public function sayHello() {

		self::$aNum ++;

		parent::$aNum ++;

		print "hello (".self::$aNum.") <br> "; 

	}
}



$example1 = new StaticExample();

StaticExample::$aNum++;

$example1::sayHello();

StaticExampleSon::sayHello();


// 共享意味着 子类对静态属性进行操作会影响父类

var_dump(StaticExampleSon::$aNum);

var_dump(StaticExample::$aNum);
