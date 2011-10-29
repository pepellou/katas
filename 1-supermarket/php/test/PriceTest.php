<?php

require_once 'src/Item.php';

class PriceTest extends PHPUnit_Framework_TestCase {

	public function test_simple_price(
	) {
		$aPrice = 15;
		$anItem = new Item($aPrice);

		$this->assertEquals($aPrice, $anItem->price());
	}

	public function test_simple_price_group(
	) {
		$aPrice = 15;
		$anItem = new Item($aPrice);
		$someItems = array($anItem, $anItem, $anItem);

		$aPack = new Pack($someItems);

		$this->assertEquals(3 * $aPrice, $aPack->price());
	}

	public function test_three_for_a_dollar(
	) {
		//...
	}

}

?>
