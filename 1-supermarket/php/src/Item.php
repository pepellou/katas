<?php

class Item {

	var $price;

	public function __construct(
		$price
	) {
		$this->price = $price;
	}

	public function price(
	) {
		return $this->price;
	}

}

class Pack {

	var $items;

	public function __construct(
		$items
	) {
		$this->items = $items;
	}

	public function price(
	) {
		$total = 0;
		foreach ($this->items as $item) {
			$total += $item->price();
		}
		return $total;
	}

}

?>
