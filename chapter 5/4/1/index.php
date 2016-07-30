<?php
/**
 * Created by PhpStorm.
 * User: shaco
 * Date: 16-7-29
 * Time: 下午3:58
 */

require_once 'CdProduct.php';

$cdProduct1 = new CdProduct();
$cdProduct2 = new CdProduct();
$cdProduct1->init("This is CD Product1",3.0);
$cdProduct2->init("This is CD Product2",3.0);

$prodClass = new ReflectionClass('CdProduct');

echo '<pre>';

echo '<h1>prodClass</h1>:<br>';
var_dump($prodClass);

echo '<h1>CdProduct Reflection</h1>:<br>';
Reflection::export($prodClass);

echo '</pre>';
