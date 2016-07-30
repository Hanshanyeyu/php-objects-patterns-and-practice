<?php
/**
 * Created by PhpStorm.
 * User: shaco
 * Date: 16-7-29
 * Time: 下午3:55
 */

class CdProduct {

    private $name;
    private $price;

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function init($name,$price){
        $this->name = $name;
        $this->price = $price;
        return $this;
    }

    public function doPrint(){
        printf(" Product Name :%s<br>",$this->name);
        printf(" Product Price :%f<br>",$this->price);
    }
}

