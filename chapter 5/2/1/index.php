<?php

 function __autoload($classname){

    $classname = str_replace("\\","/",$classname);
	$classpath= __DIR__ . "/" .$classname.'.php';

	 if(file_exists($classpath)){
	 	 require_once($classpath);
	 }
	 else{
	  	echo 'class file '.$classpath.' not found!';
	 }
}



use useful\SayHello;
use useful\Outputter;

class Index {

    public function __construct()
    {
        new SayHello();
        new Outputter();
    }
}


$index = new Index();