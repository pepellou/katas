<?php

require_once 'src/chop.php';

class ChopTest extends PHPUnit_Framework_TestCase {

	public function test_all(
	) {
		$implementations = array(
			new IterativeChop()
		);
		foreach ($implementations as $imp) {
			$this->assertEquals(-1, $imp->chopArray(3, array()));
			$this->assertEquals(-1, $imp->chopArray(3, array(1)));
			$this->assertEquals(0,  $imp->chopArray(1, array(1)));
			$this->assertEquals(0,  $imp->chopArray(1, array(1, 3, 5)));
			$this->assertEquals(1,  $imp->chopArray(3, array(1, 3, 5)));
			$this->assertEquals(2,  $imp->chopArray(5, array(1, 3, 5)));
			$this->assertEquals(-1, $imp->chopArray(0, array(1, 3, 5)));
			$this->assertEquals(-1, $imp->chopArray(2, array(1, 3, 5)));
			$this->assertEquals(-1, $imp->chopArray(4, array(1, 3, 5)));
			$this->assertEquals(-1, $imp->chopArray(6, array(1, 3, 5)));
			$this->assertEquals(0,  $imp->chopArray(1, array(1, 3, 5, 7)));
			$this->assertEquals(1,  $imp->chopArray(3, array(1, 3, 5, 7)));
			$this->assertEquals(2,  $imp->chopArray(5, array(1, 3, 5, 7)));
			$this->assertEquals(3,  $imp->chopArray(7, array(1, 3, 5, 7)));
			$this->assertEquals(-1, $imp->chopArray(0, array(1, 3, 5, 7)));
			$this->assertEquals(-1, $imp->chopArray(2, array(1, 3, 5, 7)));
			$this->assertEquals(-1, $imp->chopArray(4, array(1, 3, 5, 7)));
			$this->assertEquals(-1, $imp->chopArray(6, array(1, 3, 5, 7)));
			$this->assertEquals(-1, $imp->chopArray(8, array(1, 3, 5, 7)));
		}
	}

}

?>
