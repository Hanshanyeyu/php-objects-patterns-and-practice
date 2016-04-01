<?php 
/**
 *
 *	类的静态属性,与所有该类对象共享,其中任意类对静态对象或者类对
 *	该属性进行调整,对应的对象以及类属性全部同时变动
 *
 */
class StaticExample {

	static public $aNum = 0;

	static public function sayHello() {

		// 内部通过self 进行调用
		self::$aNum ++;

		print "hello (".self::$aNum.") \n "; 
	}
}



$example1 = new StaticExample();

//外部通过 类名进行调用
StaticExample::$aNum++;

$example1::sayHello();

