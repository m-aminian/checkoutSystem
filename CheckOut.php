<?php
require_once('ItemInterface.php');

class CheckOut{

	protected $cart = [];

	protected $scannedItem = [];

	protected $total = 0;

	public function scan(itemInterface $item){
		array_push($this->cart, $item);	
	}

	public function total(){
		foreach ($this->cart as $element){
			array_push($this->scannedItem, $element->getName());
			$this->total += $element->getTotalPrice();
		}

		echo "SKUs Scanned: ".implode(", ", $this->scannedItem).PHP_EOL;
		echo "Total expected: $".$this->total.PHP_EOL;
	}
}
