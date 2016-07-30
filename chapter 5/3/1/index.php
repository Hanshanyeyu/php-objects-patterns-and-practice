<?php
/**
 * Created by PhpStorm.
 * User: shaco
 * Date: 16-7-29
 * Time: 下午3:58
 */

require_once 'CdProduct.php';


$cdProduct = new CdProduct();

call_user_func( array($cdProduct,"setName"),"This is CD Product");
$cdProduct->doPrint();

$return = call_user_func( array($cdProduct,"setName"),"This is CD Product");

$cdProduct->doPrint();

echo 'Return :<br>';
var_dump($return);
echo '<br>';

call_user_func( array($cdProduct,"init"),"This is CD Product",3.0);
$cdProduct->doPrint();