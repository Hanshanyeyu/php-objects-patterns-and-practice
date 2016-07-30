<?php

/**
 * Created by PhpStorm.
 * User: shaco
 * Date: 16-7-30
 * Time: 上午9:40
 */
class Person
{
    public $name;
    function __construct ( $name){
        $this->name = $name;
    }
}

interface Module{
    function execute();
}

class FtpModule implements Module{
    function setHost( $host ){
        print "FtpModule::setHost() : $host<br>";
    }

    function setUser( $user ){
        print "FtpModule::setUser() : $user<br>";
    }

    function execute()
    {
        print "FtpModule Execute() <br>";
    }
}

class PersonModule implements Module{
    function setPerson( Person $person){
        print "PersonModule::setPerson(): {$person->name} <br>";
    }

    function execute()
    {
        print "PersonModule Execute() <br>";
    }
}

class ModuleRunner {
    private $configData
            = array (
                "PersonModule" => array( 'person' => 'bob') ,
                "FtpModule"    => array( 'host' => 'example.com',
                                         'user' => 'anon')
            );

    private $modules = array();

    function init()
    {
        $interface = new ReflectionClass('Module');
        foreach ($this->configData as $moduleName => $params) {
            $moduleClass = new ReflectionClass($moduleName);
            if (!$moduleClass->isSubclassOf($interface)) {
                throw new Exception(" unknown module type: $moduleName ");
            }
            $module = $moduleClass->newInstance();
            foreach ($moduleClass->getMethods() as $method) {
                $this->handleMethod($module, $method, $params);
            }
            array_push($this->modules, $module);
        }
    }

    public function handleMethod(Module $module , ReflectionMethod $method , $params ){
        $name = $method->getName();
        $args = $method->getParameters();

        if( count($args) !=1  || substr($name, 0 ,3) !="set"){
            return false;
        }

        $property = strtolower( substr( $name,3));
        if( ! isset( $params[$property]) ){
            return false;
        }

        // 判断参数是否需要实例化
        $argClass = $args[0]->getClass();
        if(empty($argClass)){
            $method->invoke( $module , $params[$property] );
        }else{
            $method->invoke($module , $argClass->newInstance( $params[$property]));
        }
    }

    public function executeAll(){
        foreach($this->modules as $module){
            call_user_func(array($module,"execute"));
        }
    }
}

$test = new ModuleRunner();
$test->init();
$test->executeAll();

