<?php
function Result($result='') {
	switch ($result) {
		case 'warn':
			return '⚠️';

		case 'disallow':
			return '⛔️';

		case 'tag':
			return '🔖';
		
		default:
			return $result;
	}
}
