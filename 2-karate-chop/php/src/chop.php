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
			$mid = round(($right + $left) / 2);
			if ($values[$mid] == $toSearch)
				return $mid;
			if ($values[$mid] < $toSearch)
				$left = $mid + 1;
			else
				$right = $mid - 1;
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
		$mid = round(($right + $left) / 2);
		if ($values[$mid] == $toSearch)
			return $mid;
		if ($values[$mid] < $toSearch)
			return $this->_chop($toSearch, $values, $mid + 1, $right);
		else
			return $this->_chop($toSearch, $values, $left, $mid - 1);
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
		if ($count == 1)
			return ($values[0] == $toSearch) ? 0 : -1;
		$mid = round($count / 2);
		if ($toSearch < $values[$mid])
			return $this->chopArray($toSearch, array_slice($values, 0, $mid));
		$right = $this->chopArray($toSearch, array_slice($values, $mid));
		return ($right == -1) ? -1 : $mid + $right;
	}

}

?>
