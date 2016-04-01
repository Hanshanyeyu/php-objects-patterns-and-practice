<?php
include 'Barcode.php';
include 'Chargeable.php';
include 'ShopProduct.php';


class CDProduct extends ShopProduct implements Chargeable,Barcode {
    
    private $price = "2.1";

    public function getPrice(){
        return $this->price;
    }

    public function scan(){
        print '||||||||||';
    }
}


