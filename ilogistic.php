<?php
require_once 'src/curl.php';
require_once 'src/authentication.php';
require_once 'src/product.php';
require_once 'src/order.php';

$token = "";

include 'src/productMethods.php';
include 'src/orderMethods.php';



$product = new Product("111","Alma","food");

$order = new Order(
					array("name" => "alma",
								"email" => "alma@alma.hu",
								"phoneNumber" => "1",
								"country" => "alma",
								"postCode" => "1111",
								"city" => "alma",
								"address" => "alma 1",
								"company" => "GLS",
								"aptNumber" => 1),
					array("name" => "alma",
								"email" => "alma@alma.hu",
								"phoneNumber" => "1",
								"country" => "alma",
								"postCode" => 1111,
								"city" => "alma",
								"address" => "alma 1"),
					array("type" => "Bankkártyás fizetés",
								"cost" => 100),
					array(array("itemNumber" => "111",
								"quantity" => 3)));
$order->id = 111;

//auth($token);

//getProducts($token);
//getProduct($product, $token);
//addProduct($product, $token);
//patchProduct($product, $token);

//getOrders($token);
//getOrder($order, $token);
//addOrder($order, $token);
//deleteOrder($order, $token);
//patchOrder($order, $token);

?>