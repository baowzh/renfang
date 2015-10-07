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


class dynaform {

	protected $param;


	public function __construct()
	{
		$this->param = array(
			'host' => 'localhost',
			'username' => 'qshsti',
			'password' => 'qsh#2013',
			'dbname' => 'qshdata'
		);
	}

	public function formatPost($p)
	{
		$ret = array();
		$ret['name'] = $p['name'];
		$ret['telphone'] = $p['telphone'];
		$ret['email'] = $p['email'];
		$ret['mailaddress'] = $p['mailaddress'];
		$ret['homeaddress'] = $p['homeaddress'];
		$ret['subject'] = $p['subject'];
		$ret['content'] = $p['content'];
		return $ret;
	}

	public function add_ldxx($data){
		$db = Zend_Db::factory('pdo_mysql' , $this->param);		
		$data = $this->formatPost($data);
		$data['itype'] = 'ldxx';
		$db->query("set names utf8");
		$db->insert('v9_dynaform1' , $data);
		echo "<script>alert('ok');location.href='/';</script>";
		return true;
	}

	public function add_tzh($data)
	{
		$db = Zend_Db::factory('pdo_mysql' , $this->param);		
		$data = $this->formatPost($data);
		$data['itype'] = 'tzh';
		$db->query("set names utf8");
		$db->insert('v9_dynaform1' , $data);
		echo "<script>alert('ok');location.href='/';</script>";
		return true;
	}

	public function add_jyxc($data)
	{
		$db = Zend_Db::factory('pdo_mysql' , $this->param);		
		$data = $this->formatPost($data);
		$data['itype'] = 'jyxc';
		$db->query("set names utf8");
		$db->insert('v9_dynaform1' , $data);
		echo "<script>alert('ok');location.href='/';</script>";
		return true;
	}

	public function add_wsxf($data)
	{
		$db = Zend_Db::factory('pdo_mysql' , $this->param);		
		$data = $this->formatPost($data);
		$data['itype'] = 'wsxf';
		$db->query("set names utf8");
		$db->insert('v9_dynaform1' , $data);
		echo "<script>alert('ok');location.href='/';</script>";
		return true;
	}	
}

$c = new dynaform();
switch ($_GET['fid']){
	case 'ldxx':
		$c->add_ldxx($_POST);
		break;
	case 'tzh':
		$c->add_tzh($_POST);
		break;
	case 'jyxc':
		$c->add_jyxc($_POST);
		break;
	case 'wsxf':
		$c->add_wsxf($_POST);
		break;
	default:
	 	break;
}

