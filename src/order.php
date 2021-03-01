<?php
class Order {
	public $id;

	public $delivery = array("name",
								"email",
								"phoneNumber",
								"country",
								"postCode",
								"city",
								"address",
								"company",
								"aptNumber");
	public $billing = array("name",
								"email",
								"phoneNumber",
								"country",
								"postCode",
								"city",
								"address");
	public $payment = array("type",
								"cost");
	public $content = array("itemNumber",
								"quantity");
								
	public function __construct(array $delivery,array $billing,array $payment, $content){
		$this -> delivery = $delivery;
		$this -> billing = $billing;
		$this -> payment = $payment;
		$this -> content = $content;
	}							
}
?>