<?php 
class ShopProduct {

	const AVAILABLE = 0;
	const OUT_OF_STOCK = 1;
}

class ShopProductSon extends ShopProduct{

	const OUT_OF_STOCK = 2;

}

$shop = new ShopProduct();


var_dump($shop::AVAILABLE);

var_dump(ShopProduct::OUT_OF_STOCK);

// const 能被继承, 也能被重写
var_dump(ShopProductSon::OUT_OF_STOCK);

var_dump(ShopProductSon::AVAILABLE);