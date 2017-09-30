<?php
require_once(__DIR__.'/config/config.php');
date_default_timezone_set('UTC');
require(__DIR__.'/curl.php');
require(__DIR__.'/login.php');
if (!in_array(PHP_SAPI, $C["allowsapi"])) {
	exit("No permission");
}

echo "The time now is ".date("Y-m-d H:i:s")." (UTC)\n";

$datafile = __DIR__."/data/setting.json";
$data = @file_get_contents($datafile);
if ($data === false) {
	$data = $C['defaultdata'];
} else if (($data = json_decode($data, true)) === null) {
	$data = $C['defaultdata'];
}
$data += $C['defaultdata'];

login();

$res = cURL($C["wikiapi"]."?".http_build_query(array(
	"action" => "query",
	"format" => "json",
	"list" => "abuselog",
	"aflend" => $data["lasttime"],
	"aflprop" => "ids|user|title|action|result|timestamp|hidden|revid|filter",
	"afllimit" => "50"
)));
if ($res === false) {
	exit("fetch page fail\n");
}
$res = json_decode($res, true);
echo count($res["query"]["abuselog"])."\n";
if (count($res["query"]["abuselog"])) {
	foreach (array_reverse($res["query"]["abuselog"]) as $log) {
		if ($log["id"] <= $data["lastid"]) {
			continue;
		}
		$time = strtotime($log["timestamp"])+3600*8;
		$message = date("Y年m月d日", $time)." (".$C["day"][date("w", $time)].") ".date("H:i", $time)."：[".$log["user"]."](https://zh.wikipedia.org/wiki/Special:Contributions/".$log["user"].") ([對話](https://zh.wikipedia.org/wiki/User_talk:".$log["user"].")) 在 [".$log["title"]."](https://zh.wikipedia.org/wiki/".$log["title"].") 執行操作 \"".$log["action"]."\" 時觸發了 [過濾器 ".$log["filter_id"]."](https://zh.wikipedia.org/wiki/Special:AbuseFilter/".$log["filter_id"].")。 採取的行動：".$log["result"]."； 過濾器描述：".$log["filter"]." ([詳細資料](https://zh.wikipedia.org/wiki/Special:AbuseLog/".$log["id"].")".(isset($log["revid"])?" | [差異](https://zh.wikipedia.org/wiki/Special:Diff/".$log["revid"].")":"").")";
		$commend = 'curl https://api.telegram.org/bot'.$C['token'].'/sendMessage -d "chat_id='.$C['chat_id'].'&parse_mode=Markdown&disable_web_page_preview=1&text='.urlencode($message).'"';
		system($commend);
	}
	$data["lasttime"] = $res["query"]["abuselog"][0]["timestamp"];
	$data["lastid"] = $res["query"]["abuselog"][0]["id"];
}

file_put_contents($datafile, json_encode($data));
