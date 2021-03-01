<?php

function prepare_headers( string $token ): array {
	return array(
		'Content-Type'  => 'application/json',
		'Accept'        => 'application/json',
		'Authorization' => 'Bearer ' . $token
	);
}

function getToken(){
	$url = "http://api.ilogistic.eu/authentication/login";
	$fields = [
	    'header '  => prepare_headers(''),
	    'Email'    => "",
	    'Password' => ""
	];
	cUrlPost($url, $fields);
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