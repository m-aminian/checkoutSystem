<?php 
require_once('CheckOut.php');
require_once('Item.php');

try {
	$item1 = new Item("a9001", 1);
	$item2 = new Item("a9002", 5);

} catch (Exception $e) {
	echo $e->getMessage().PHP_EOL;
	exit();
}

$checkOut = new CheckOut();
$checkOut->scan($item1);
$checkOut->scan($item2);
$checkOut->total();
