<?php
function getToken(){
	$url = "http://api.ilogistic.eu/authentication/login";
	$fields = "Email=&Password=";
	
	$ch = curl_init();
	
	$headers = array();
	$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
	
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
	
	$obj = json_decode(curl_exec($ch), true);
	
	//Visualize
	var_dump($obj);
}

function auth(string $token){
	$ch = new Curl($token);
	
	$url = "http://api.ilogistic.eu/authentication/auth";
	$result = $ch->cUrlGet($url, $token);
	$obj = json_decode($result, true);
	
	//Visualize
	echo $obj['token'];
		
	$ch->cUrlClose();
}
?>