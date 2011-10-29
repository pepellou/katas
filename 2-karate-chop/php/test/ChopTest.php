<?php

require_once 'src/chop.php';

class ChopTest extends PHPUnit_Framework_TestCase {

	public function test_all(
	) {
		$this->assertEquals(-1, chopArray(3, array()));
		$this->assertEquals(-1, chopArray(3, array(1)));
		$this->assertEquals(0,  chopArray(1, array(1)));
		$this->assertEquals(0,  chopArray(1, array(1, 3, 5)));
		$this->assertEquals(1,  chopArray(3, array(1, 3, 5)));
		$this->assertEquals(2,  chopArray(5, array(1, 3, 5)));
		$this->assertEquals(-1, chopArray(0, array(1, 3, 5)));
		$this->assertEquals(-1, chopArray(2, array(1, 3, 5)));
		$this->assertEquals(-1, chopArray(4, array(1, 3, 5)));
		$this->assertEquals(-1, chopArray(6, array(1, 3, 5)));
		$this->assertEquals(0,  chopArray(1, array(1, 3, 5, 7)));
		$this->assertEquals(1,  chopArray(3, array(1, 3, 5, 7)));
		$this->assertEquals(2,  chopArray(5, array(1, 3, 5, 7)));
		$this->assertEquals(3,  chopArray(7, array(1, 3, 5, 7)));
		$this->assertEquals(-1, chopArray(0, array(1, 3, 5, 7)));
		$this->assertEquals(-1, chopArray(2, array(1, 3, 5, 7)));
		$this->assertEquals(-1, chopArray(4, array(1, 3, 5, 7)));
		$this->assertEquals(-1, chopArray(6, array(1, 3, 5, 7)));
		$this->assertEquals(-1, chopArray(8, array(1, 3, 5, 7)));
	}

}

?>
