<?php
class Product {
    public $id;
    public $itemNumber;
	public $barCode;
    public $name;
	public $type;
    public $category;
	public $weight;
	public $width;
    public $height;
    public $depth;
    public $fragile;
	public $price;
    public $tax = 27;
    public $critical;
   
	public function __construct(string $id, string $name, string $category){
		$this -> id = $id;
		$this -> itemNumber = $id;
		$this -> barCode = $id;
		$this -> name = $name;
		$this -> type = $category;
		$this -> category = $category;
	}
}
?>