<?php

defined('APPLICATION_PATH')
||define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/'));

set_include_path(implode(PATH_SEPARATOR, array(
					       realpath(APPLICATION_PATH. '/'),
					       get_include_path()
					       )));
require_once 'Zend/Loader/Autoloader.php';
$loader = Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace("Zend");


class PhpcmsAuth {

	protected $config;

	public function __construct()
	{
		$this->config = new Zend_Config_Xml(APPLICATION_PATH."/Auth.xml", "auths");
	}

	protected function get_subcat($catid)
	{
		$dbconfig  = require(APPLICATION_PATH .'/../caches/configs/database.php');
		$dbparam = array(
			'username' => $dbconfig['default']['username'],
			'password' => $dbconfig['default']['password'],
			'dbname' => $dbconfig['default']['database'],
			'host' => $dbconfig['default']['hostname'],
		);
		//echo "<pre>";
		//var_dump($dbparam);
		//die;
		$db = Zend_Db::factory('pdo_mysql', $dbparam);
		//$sql = "select arrchildid from v9_category where catid = " . $catid;
		$sql = $db->quoteInto("select arrchildid from v9_category where catid = ?" , $catid);
		$row = $db->fetchOne($sql);
		if (!row) return array();
		return explode("," , $row);
	}

	public function showcatgorys($userid , $roleid )
	{
		$tmp = array();		
		foreach($this->config->item as $k)
		{
			if ( ($k->usrid == $userid) and ($k->roleid == $roleid) )
				{
				$tmp[] = $k->catid;

				// 如果允许全部子栏目可显示......
				$subcats = $this->get_subcat($k->catid);
				foreach($subcats as $key=>$val){
					$tmp[] = $val;
				}
			}
		}
		return $tmp;
	}

	public function check_dynamic_auth($siteid, $roleid, $catid)
	{
		$ret = false;
		foreach($this->config->item as $a)
		{
			if (($a->catid == $catid) and ($a->siteid == $siteid) and ($a->roleid == $roleid))
			{
				return true;
			}
			$subcats = $this->get_subcat($catid);
			if (is_array($subcats)){
				foreach($subcats as $k=>$v){
					if ($v == $catid)
						return true;
				}
			}
		}
		return false;
	}

	public function push_dynamic_auth($siteid ,$roleid,$catid)
	{
		$ret = array(
			'catid' => $catid,
			'siteid' => $siteid,
			'roleid' => $roleid,
			'is_admin'=>1,
			'action'=>'init'
		);
		return $ret;
	}
}

