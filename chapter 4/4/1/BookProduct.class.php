<?php
include 'ShopProductAbstract.class.php';

class BookProduct extends ShopProductAbstract {

    // Access level to BookProduct::getName() must 
    // be public (as in class ShopProductAbstract)
    // private function getName(){
    // }

    //Declaration of BookProduct::getName() must 
    //be compatible with ShopProductAbstract::getName()
    // public function getName($name){
    // }
     
    public function getName(){
        echo $name;
    }

    //  Declaration of BookProduct::bindProduct() must be 
    //  compatible with ShopProductAbstract::bindProduct(ShopProductAbstract $product)
    // public function bindProduct($name){
    // }
        
    public function bindProduct(ShopProductAbstract $product){
        return array($this,$product);
    }
}


$book1 = new BookProduct();
$book2 = new BookProduct();


$result = $book1->bindProduct($book2);
var_dump($result);

// Catchable fatal error: Argument 1 passed to BookProduct::bindProduct() 
// must be an instance of ShopProductAbstract, string given
// $result = $book1->bindProduct("hello");
// var_dump($result);



