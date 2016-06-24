<?php

// function __autoload($classname){
//     echo " Join __autoload function ;<br>";

//     $classname = str_replace("\\","/",$classname);
//     $classpath= __DIR__ . "index.php/" .$classname.'.php';

//     if(file_exists($classpath)){
//         require_once($classpath);
//     }
//     else{
//         echo 'class file '.$classpath.' not found!';
//     }
// }


use useful\SayHello;
use useful\Outputter;

class Index {

    public function __construct()
    {
         echo "Join Index __construct() function <br>";
    }

    public static function autoload($classname){

        echo " Join Index::autoload() function ;<br>";

        $classname = str_replace("\\","/",$classname);
        $classpath= __DIR__ . "/" .$classname.'.php';

        if(file_exists($classpath)){
            require_once($classpath);
        }
        else{
            echo 'class file '.$classpath.' not found!';
        }
    }

    public static function autoload2($classname){

        echo " Join Index::autoload2() function ;<br>";
    }

    public function doSay(){
        new SayHello();
        new Outputter();
    }
}



spl_autoload_register( array("Index" , "autoload") );
spl_autoload_register( array("Index" , "autoload2") );

$index = new Index();
$index->doSay();