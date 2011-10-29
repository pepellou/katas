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
		$count = count($values);
		if ($count == 0)
			return -1;
		if ($count == 1)
			return ($values[0] == $toSearch) ? 0 : -1;
		$middle = round($count / 2);
		if ($toSearch < $values[$middle])
			return $this->chopArray($toSearch, array_slice($values, 0, $middle));
		$right = $this->chopArray($toSearch, array_slice($values, $middle));
		return ($right == -1) ? -1 : $middle + $right;
	}

}

?>
