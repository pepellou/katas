<?php

function chopArray(
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

?>
