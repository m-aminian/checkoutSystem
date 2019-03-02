<?php

class Rule{
	public function threeForTwo($price, $count){
		return ($count - floor($count/3))*$price;
	}

	public function bulkDiscount($price, $count){
		return ($count>4) ? 499.99*$count : $price*$count;
	}

	public function bundle($price, $count){
		return $price*$count;
	}
}
