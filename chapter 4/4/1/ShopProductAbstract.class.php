<?php

abstract class ShopProductAbstract {

    // Abstract function ShopProductAbstract::getName() cannot contain body
    // abstract public function getName(){
    // }
    
    // Abstract function ShopProductAbstract::getName() cannot be declared private    
    // abstract private function getName();

    abstract function getName();

    abstract function bindProduct(ShopProductAbstract $product);
}

