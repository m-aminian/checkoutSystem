<?php 
require_once('ItemInterface.php');
require_once('Rule.php');

class Item implements itemInterface{
	private $sku;

	private $name;

	private $price;

	private $count;

	private $discountRule;

	private $freebie;

	private $rule;

	public function __construct($sku, $count){
		$data = yaml_parse_file("data/products.yaml");

		if( !isset($data[$sku]) )
			throw new Exception("Error: item ".$sku." not found.");
			
		$this->sku = $sku;
		$this->count = $count;
		$this->name = $data[$sku]["name"];
		$this->price = $data[$sku]["price"];
		$this->discountRule = $data[$sku]["discount"];
		$this->freebie = (isset($data[$sku]["freebie"]))?$data[$sku]["freebie"]:null;
		$this->rule = new Rule();
	}

	public function getSku(){
		return $this->sku;
	}

	public function getName(){
		return (empty($this->freebie))?$this->name:$this->name.', '.$this->freebie;
	}

	public function getCount(){
		return $this->count;
	}

	public function getPrice(){
		return $this->price;
	}

	public function getTotalPrice(){
		return $this->rule->{$this->discountRule}($this->price, $this->count);
	}
}
