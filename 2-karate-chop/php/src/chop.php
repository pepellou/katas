<?php

function chopArray(
	$toSearch,
	$values
) {
	$pos = 0;
	while ($pos < count($values)) {
		if ($values[$pos] == $toSearch)
			return $pos;
		$pos++;
	}
	return -1;
}

?>
