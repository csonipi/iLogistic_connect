<?php
function getOrders(string $token){
	$ch = new Curl($token);
	
	$url = "https://api.ilogistic.eu/orders/orders";
	$result = $ch->cUrlGet($url, $token);
	$obj = json_decode($result, true);
	
	//Visualize
	var_dump($obj);
	for($i = 0; $i < count($obj); $i++){
		$product = $obj[$i];
		echo $product['id']."<br>";
		echo $product['state']."<br>";
		echo $product['foreignId']."<br>";
		echo $product['parcelNumber']."<br>";
	}
	
	$ch->cUrlClose();
}

function getOrder(Order $order, string $token){
	$ch = new Curl($token);
	
	$url = "https://api.ilogistic.eu/orders/order/".$order->id;
	$result = $ch->cUrlGet($url, $token);
	$obj = json_decode($result, true);
	
	//Visualize
	var_dump($obj);
	echo $obj['id']."<br>";
	echo $obj['state']."<br>";
	echo $obj['foreignId']."<br>";
	echo $obj['parcelNumber']."<br>";
		
	$ch->cUrlClose();
}

function addOrder(Order $order, string $token){
	$ch = new Curl($token);
	
	$body = json_encode($order, JSON_UNESCAPED_UNICODE );
	$url = "https://api.ilogistic.eu/orders/orders";

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

function deleteOrder(Order $order, string $token){
	$ch = new Curl($token);
	
	$url = "https://api.ilogistic.eu/orders/order/".$order->id;

	$result = $ch->cUrlDelete($url, $token);
	$obj = json_decode($result, true);
	
	//Visualize
	var_dump($obj);
	echo $obj['id']."<br>";
	
	$ch->cUrlClose();
};

function patchOrder(Order $order, string $token){
	$ch = new Curl($token);
	
	$body = json_encode($order->delivery, JSON_UNESCAPED_UNICODE );
	$url = "https://api.ilogistic.eu/orders/order/".$order->id;

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