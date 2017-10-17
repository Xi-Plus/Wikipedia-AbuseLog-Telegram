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
		case   4: return '👦➖➖➖ '; // 新用户大量删除条目内容
		case   5: return '👦➖🔖 '; // 新用户移除ref脚注
		case   6: return '🆖 '; // 点击工具条产生之测试性编辑
		case  14: return '🤵➖🗑🚩 '; // 自动确认用户移除删除模板
		case  16: return '👦➖🗑🚩 '; // 新用户或页面创建者移除删除模板
		case  20: return '😀😄😁 '; // 包含其他符号和象形文字
		case  26: return '👖 '; // 创建极短条目
		case  27: return '👦✏️👥 '; // 编辑其他用户的用户页
		case  31: return '👦🗳 '; // 新用户投票
		case  32: return '🆕🈚️🔎 '; // 没有wikify的新条目
		case  36: return '🈚️🔎 '; // 新增内容没有wikify
		case  37: return '➖👖🚩 '; // 移除關注度/小小作品模板
		case  46: return '➖💎🚩 '; // 条目特色/優良状态被删除
		case  53: return '👨‍💻🔗 '; // 添加博客链接
		case  54: return '🚩❌ '; // 模板参数错误
		case  65: return '🚧🖼️ '; // 加入无效图片
		case  68: return '🈚️🖐 '; // 没有首段的条目
		case  98: return '👦➖💱 '; // 新用户移除NoteTA
		case 102: return '➡️ '; // 从用户页/用户对话页/草稿页移动到条目空间
		case 105: return '👦✏️🗣 '; // 立即编辑自己收到欢迎后的用户对话页
		case 107: return '👦🖼️ '; // 新用户在条目中添加图像
		case 117: return '🅰️🅰️🅰️ '; // Repeating characters - enwiki#135
		case 118: return '👦➖➖ '; // 清空章節
		case 122: return '⚙️⛔️ '; // 机器人过度作业
		case 126: return '🔠 '; // 使用私有区编码
		case 137: return '🅰️🅱️🅾️ '; // 无意义字符
		case 154: return '❕⚙️🔗 '; // 非机器人增加跨语言链接
		case 156: return '👨‍💻🔗 '; // 百度贴吧不可靠来源
		case 180: return '🚫👀🔠 '; // 含有不可见字符
		case 181: return '⚙️⛔️ '; // Antigng-bot频率控制 3
		case 190: return '🇨🇳🇹🇼🚩 '; // 监测对于大陆/台湾国籍模板的变动
		case 191: return '👎🇨🇳🇹🇼 '; // 违反两岸用语方针
		case 197: return '🗑️🚩 '; // 添加刪除模板
		case 198: return '👦🆕👥 '; // 新用户于他人的用户空间创建页面
		case 202: return '❌❌❌ '; // 加入那个F开头的单词
		case 203: return '👎🔗 '; // 添加不合規範之跨語言連結
		case 205: return '➖👎🔗🚩 '; // 移除Link style模板
		case 217: return '台↔️臺 '; // 手动转换異體字
		case '' :
			switch ($filter) {
				case '新用户加入明显宣传性内容': return '📢 ';
				case '阻止加入破坏者常用词汇': return '🔞 ';
				case '添加不可信来源': return '👨‍💻🔗 ';
				case '地域或团体观点（安全）': return '👥👀 ';
				default : return '';
			}
		default : return '';
	}
}
