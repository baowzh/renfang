<?php
defined('IN_PHPCMS') or exit('No permission resources.');
class ysqgk_tag {
 	private $ysqgk_db;

	public function __construct() {
		$this->ysqgk_db = pc_base::load_model('ysqgk_model');
		$this->type_db = pc_base::load_model('type_model');
 	}

 	/**
 	 * 取出该分类的详细 信息
  	 * @param $typeid 分类ID
 	 */

 	public function get_type($data){
 		$typeid = intval($data['typeid']);
 		if($typeid=='0'){
 			$arr = array();
 			$arr['name'] = '默认分类';
 			return $arr;
 		}else {
		$r = $this->type_db->get_one(array('typeid'=>$typeid));
  		return new_html_special_chars($r);
 		}


 	}

	/**
	 * 标签列表类
	 * @param  $data
	 */
	public function lists($data) {
		$typeid = intval($data['typeid']);//分类ID
		$siteid = $data['siteid'];
		$passed = $data['passed'];
		if(empty($siteid)){
		$siteid = get_siteid();
		}
  		if($typeid!='' and $passed!=''){
 				$sql = array('typeid'=>$typeid,'siteid'=>$siteid,'passed'=>$passed);
			}elseif($typeid!=''){
				$sql = array('typeid'=>$typeid,'siteid'=>$siteid);
			}elseif($passed){
				$sql = array('siteid'=>$siteid,'passed'=>$passed);
			}else {
				$sql = array('siteid'=>$siteid);
		}
  		$r = $this->ysqgk_db->select($sql, '*', $data['limit'], 'addtime '.$data['order']);
		$pages = $this->db->pages;
		return new_html_special_chars($r);
	}
		/**
	 * 查看邮件标签
	 * @param  $data
	 */
	public function sg($data) {
	$ysqgk_id =$data['ysqgkid'];
	if(empty($ysqgk_id)){
	$ysqgk_id = '';
		}
	$bh = $data['bh'];
	$siteid = $data['siteid'];
	$pass = $data['pass'];
    if(empty($siteid)){
		$siteid = get_siteid();
		}
	if($pass){$pass = md5($pass);}
	if ($pass!='' and $ysqgk_id!=''){
	$sql = array('ysqgkid'=>$ysqgk_id,'pass'=>$pass,'siteid'=>$siteid);
	}elseif($ysqgk_id!==''){
	$sql = array('ysqgkid'=>$ysqgk_id,'siteid'=>$siteid);
	}elseif($bh!=''){
	$sql = array('bh'=>$bh,'siteid'=>$siteid);
	}
  		$r = $this->ysqgk_db->select($sql, '*', $data['limit'], 'addtime '.$data['order']);
		return new_html_special_chars($r);
	}

	/**
	 * 分类 循环 .
	 * @param  $data
	 */
	public function type_lists($data) {
			if (!in_array($data['listorder'], array('desc', 'asc'))) {
					$data ['listorder'] = 'desc';
				}
 			$sql = array('module'=>ROUTE_M,'siteid'=>$data['siteid']);
 			$r = $this->type_db->select($sql, '*', $data['limit'], 'listorder '.$data['listorder']);
			return new_html_special_chars($r);
	}

	/**
	 *
	 * 传入的站点ID,读取站点下的邮件链接分类 ...
	 * @param $siteid 选择的站点ID
	 */
	public function get_typelist($siteid='1', $value = '', $id = '') {
   			$data = $arr = array();
			$data = $this->type_db->select(array('module'=>'ysqgk', 'siteid'=>$siteid));
			pc_base::load_sys_class('form', '', 0);
			foreach($data as $r) {
				$arr[$r['typeid']] = $r['name'];
			}
			$html = $id ? ' id="typeid" onchange="$(\'#'.$id.'\').val(this.value);"' : 'name="typeid", id="typeid"';
  			return form::select($arr, $value, $html, L('please_select'));
	}

	public function count(){

	}


}