<?php
class Curl{
	
	public $ch;
	public $headers;

	public function __construct($token){
		$this->ch = curl_init();
		$headers = array();
		$headers[] = 'Authorization: Bearer '.$token;
		$headers[] = 'Content-Type: application/json';
		
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($this->ch,CURLOPT_RETURNTRANSFER, true); 
		
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
	}
	
	//POST request
	function cUrlPost(string $url, $fields, $token){
	
		curl_setopt($this->ch,CURLOPT_URL, $url);
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($this->ch,CURLOPT_POSTFIELDS, $fields);
	
		return curl_exec($this->ch);
	}

	//PATCH request
	function cUrlPatch(string $url, $fields, $token){

		curl_setopt($this->ch,CURLOPT_URL, $url);
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
		curl_setopt($this->ch,CURLOPT_POSTFIELDS, $fields);

		return curl_exec($this->ch);
	}
	
	//GET request
	function cUrlGet(string $url, $token){
		curl_setopt($this->ch,CURLOPT_URL, $url);
		curl_setopt($this->ch,CURLOPT_CUSTOMREQUEST, 'GET');

		return curl_exec($this->ch);
	}
	
	//DELETE request
	function cUrlDelete(string $url, $token){
		curl_setopt($this->ch, CURLOPT_URL, $url);
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "DELETE");

		return curl_exec($this->ch);
	}
	
	function cUrlClose(){
		curl_close($this->ch);
	}
}
?>