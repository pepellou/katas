<?php

abstract class Chop {

	public abstract function chopArray($toSearch, $values);

}

class IterativeChop extends Chop {

	public function chopArray(
		$toSearch,
		$values
	) {
		$left = 0;
		$right = count($values) - 1;
	
		while ($left <= $right) {
			$middle = round(($right + $left) / 2);
			if ($values[$middle] == $toSearch)
				return $middle;
			if ($values[$middle] < $toSearch)
				$left = $middle + 1;
			else
				$right = $middle - 1;
		}
	
		return -1;
	}

}

class RecursiveIterativeChop extends Chop {

	public function _chop(
		$toSearch,
		$values,
		$left,
		$right
	) {
		if ($left > $right)
			return -1;
		$middle = round(($right + $left) / 2);
		if ($values[$middle] == $toSearch)
			return $middle;
		if ($values[$middle] < $toSearch)
			return $this->_chop($toSearch, $values, $middle + 1, $right);
		else
			return $this->_chop($toSearch, $values, $left, $middle - 1);
	}

	public function chopArray(
		$toSearch,
		$values
	) {
		return $this->_chop($toSearch, $values, 0, count($values) - 1);
	}

}

class RecursiveChop extends Chop {

	public function chopArray(
		$toSearch,
		$values
	) {
		return -1;
	}

}

?>
