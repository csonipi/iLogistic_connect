<?php
function getProducts(string $token){
	$ch = new Curl($token);
	
	$url = "http://api.ilogistic.eu/products/products";
	echo $url;
	$result = $ch->cUrlGet($url, $token);
	$obj = json_decode($result, true);
	
	//Visualize
	var_dump($obj);
	for($i = 0; $i < count($obj); $i++){
		$product = $obj[$i];
		echo $product['name']."<br>";
		echo $product['id']."<br>";
		echo $product['itemNumber']."<br>";
		echo $product['status']."<br>";
		echo $product['price']."<br>";
		echo $product['onStock']."<br>";
	}
	
	$ch->cUrlClose();
}

function getProduct(Product $product, string $token){
	$ch = new Curl($token);
		
	$url = "http://api.ilogistic.eu/products/product/".$product->id;
	$result = $ch->cUrlGet($url, $token);
	$obj = json_decode($result, true);
	
	//Visualize
	var_dump($obj);
		echo $obj['name']."<br>";
		echo $obj['id']."<br>";
		echo $obj['itemNumber']."<br>";
		echo $obj['status']."<br>";
		echo $obj['price']."<br>";
		echo $obj['onStock']."<br>";
		
	$ch->cUrlClose();
}

function addProduct(Product $product, string $token){
	$ch = new Curl($token);
		
	$body = json_encode($product);
	$url = "http://api.ilogistic.eu/products/products";
	$fields = [
		'body' => $body
	];
	$result = $ch->cUrlPost($url, $body, $token);
	$obj = json_decode($result, true);
	
	//Visualize
	var_dump($obj);
	echo $obj['id']."<br>";
		
	$ch->cUrlClose();
};

function patchProduct(Product $product, string $token){
	$ch = new Curl($token);
	
	$body = json_encode($product);
	$url = "http://api.ilogistic.eu/products/product/".$product->id;
	$fields = [
		'body' => $body
	];
	$result = $ch->cUrlPatch($url, $body, $token);
	$obj = json_decode($result, true);
	
	//Visualize
	var_dump($obj);
	echo $obj['id']."<br>";		
	
	$ch->cUrlClose();
};
?>