<?php
/**
 * Created by PhpStorm.
 * User: shaco
 * Date: 16-7-30
 * Time: 上午9:18
 */

require_once 'BlogAction.php';


// 执行detail方法
$method = new ReflectionMethod('BlogAction', 'detail');
$instance = new BlogAction();

// 进行权限判断
if ($method->isPublic()) {

    $class = new ReflectionClass('BlogAction');

    // 执行前置方法
    if ($class->hasMethod('_before_detail')) {
        $beforeMethod = $class->getMethod('_before_detail');
        if ($beforeMethod->isPublic()) {
            $beforeMethod->invoke($instance);
        }
    }

    $method->invoke(new BlogAction);

    // 执行后置方法
    if ($class->hasMethod('_after_detail')) {
        $beforeMethod = $class->getMethod('_after_detail');
        if ($beforeMethod->isPublic()) {
            $beforeMethod->invoke($instance);
        }
    }
}

// 执行带参数的方法
$method = new ReflectionMethod('BlogAction', 'test');
$params = $method->getParameters();
foreach ($params as $param) {
    $paramName = $param->getName();
    if (isset($_REQUEST[$paramName])) {
        $args[] = $_REQUEST[$paramName];
    } elseif ($param->isDefaultValueAvailable()) {
        $args[] = $param->getDefaultValue();
    }
}

if (count($args) == $method->getNumberOfParameters()) {
    $method->invokeArgs($instance, $args);
} else {
    echo 'parameters is wrong!';
}