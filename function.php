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

function AFLogo($id='', $filter='') {
	switch ($id) {
		case   5: return '📑 ';
		case   6: return '💊 ';
		case  14: return '➖🗑 ';
		case  16: return '🆕➖🗑 ';
		case  26: return '👖 ';
		case  27: return '✏️👥 ';
		case  46: return '💎 ';
		case 102: return '➡️ ';
		case 107: return '🖼️ ';
		case 118: return '⚪ ';
		case 126: return '🔠 ';
		case 154: return '❕⚙️🔗 ';
		case 180: return '🔠 ';
		case 181: return '⚙️ ';
		case 191: return '👎🇨🇳🇹🇼 ';
		case 197: return '🗑️ ';
		case 203: return '👎🔗 ';
		case 205: return '➖🔗 ';
		case '' :
			switch ($filter) {
				case '新用户加入明显宣传性内容': return '👍 ';
				default : return '';
			}
		default : return '';
	}
}
