<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
class yijianzhengji extends admin {
	function __construct() {
		parent::__construct();
		$this->M = new_html_special_chars(getcache('yijianzhengji', 'commons'));
		$this->db = pc_base::load_model('yijianzhengji_model');
		$this->db2 = pc_base::load_model('type_model');
	}

	public function init() { 
	 	$siteid  = $this->get_siteid();
	    $setting = getcache('yijianzhengji', 'commons');
		if($_GET['typeid']!=''){
			$where = array('typeid'=>$_GET['typeid'],'siteid'=>$this->get_siteid());
		}else{
			$where = array('siteid'=>$this->get_siteid());
		}
 		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$infos = $this->db->listinfo($where,$order = 'addtime DESC,yijianzhengjiid DESC',$page, $pages = '10');
		$pages = $this->db->pages;
		$types = $this->db2->listinfo(array('module'=>ROUTE_M,'siteid'=>$this->get_siteid()),$order = 'typeid DESC');
		$types = new_html_special_chars($types);
 		$type_arr = array ();
 		foreach($types as $typeid=>$type){
			$type_arr[$type['typeid']] = $type['name'];
		}
		$big_menu = array('javascript:;', L('yijianzhengji'));
		include $this->admin_tpl('yijianzhengji_list');
	}
	 
	//添加分类时，验证分类名是否已存在
	public function public_check_name() {
		$type_name = isset($_GET['type_name']) && trim($_GET['type_name']) ? (pc_base::load_config('system', 'charset') == 'gbk' ? iconv('utf-8', 'gbk', trim($_GET['type_name'])) : trim($_GET['type_name'])) : exit('0');
 		$typeid = isset($_GET['typeid']) && intval($_GET['typeid']) ? intval($_GET['typeid']) : '';
 		$data = array();
		if ($typeid) {
 			$data = $this->db2->get_one(array('typeid'=>$typeid), 'name');
			if (!empty($data) && $data['name'] == $type_name) {
				exit('1');
			}
		}
		if ($this->db2->get_one(array('name'=>$type_name), 'typeid')) {
			exit('0');
		} else {
			exit('1');
		}
	}
	
	//添加邮件分类
 	public function add_type() {
		if(isset($_POST['dosubmit'])) {
			if(empty($_POST['type']['name'])) {
				showmessage(L('typename_noempty'),HTTP_REFERER);
			}
			$_POST['type']['siteid'] = $this->get_siteid(); 
			$_POST['type']['module'] = ROUTE_M;
 			$this->db2 = pc_base::load_model('type_model');
			$typeid = $this->db2->insert($_POST['type'],true);
			if(!$typeid) return FALSE;
			showmessage(L('operation_success'),HTTP_REFERER);
		} else {
			$show_validator = $show_scroll = true;
			$big_menu = array('?m=yijianzhengji&c=yijianzhengji&a=init', L('yijianzhengji'));
 			include $this->admin_tpl('yijianzhengji_type_add');
		}

	}
	
	/**
	 * 删除分类
	 */
	public function delete_type() {
		if((!isset($_GET['typeid']) || empty($_GET['typeid'])) && (!isset($_POST['typeid']) || empty($_POST['typeid']))) {
			showmessage(L('illegal_parameters'), HTTP_REFERER);
		} else {
			if(is_array($_POST['typeid'])){
				foreach($_POST['typeid'] as $typeid_arr) {
 					$this->db2->delete(array('typeid'=>$typeid_arr));
				}
				showmessage(L('operation_success'),HTTP_REFERER);
			}else{
				$typeid = intval($_GET['typeid']);
				if($typeid < 1) return false;
				$result = $this->db2->delete(array('typeid'=>$typeid));
				if($result)
				{
					showmessage(L('operation_success'),HTTP_REFERER);
				}else {
					showmessage(L("operation_failure"),HTTP_REFERER);
				}
			}
		}
	}
	
	//:分类管理
 	public function list_type() {
		$this->db2 = pc_base::load_model('type_model');
		$infos = $this->db2->listinfo(array('module'=> ROUTE_M,'siteid'=>$this->get_siteid()),$order = 'listorder DESC',$page, $pages = '10');
		$big_menu = array('?m=yijianzhengji&c=yijianzhengji&a=init', L('yijianzhengji'));
		include $this->admin_tpl('yijianzhengji_list_type');
	}
  //:邮件回复管理
	public function edit() {
		if(isset($_POST['dosubmit'])){
 			$yijianzhengjiid = intval($_GET['yijianzhengjiid']);
			if($yijianzhengjiid < 1) return false;
			if(!is_array($_POST['yijianzhengji']) || empty($_POST['yijianzhengji'])) return false;
			$this->db->update($_POST['yijianzhengji'],array('yijianzhengjiid'=>$yijianzhengjiid));
			showmessage(L('operation_success'),'?m=yijianzhengji&c=yijianzhengji&a=edit','', 'edit');
			
		}else{
		    $siteid  = $this->get_siteid();
	        $setting = getcache('yijianzhengji', 'commons');
 			$show_validator = $show_scroll = $show_header = true;
			pc_base::load_sys_class('form', '', 0);
			$types = $this->db2->listinfo(array('module'=> ROUTE_M,'siteid'=>$this->get_siteid()),$order = 'typeid DESC',$page, $pages = '10');
 			$type_arr = array ();
			foreach($types as $typeid=>$type){
				$type_arr[$type['typeid']] = $type['name'];
			}
			//解出链接内容
			$info = $this->db->get_one(array('yijianzhengjiid'=>$_GET['yijianzhengjiid']));
			if(!$info) showmessage(L('yijianzhengji_exit'));
			extract($info); 
 			include $this->admin_tpl('yijianzhengji_edit');
		}

	}
	
	/**
	 * 修改邮件 分类
	 */
	public function edit_type() {
		if(isset($_POST['dosubmit'])){ 
			$typeid = intval($_GET['typeid']); 
			if($typeid < 1) return false;
			if(!is_array($_POST['type']) || empty($_POST['type'])) return false;
			if((!$_POST['type']['name']) || empty($_POST['type']['name'])) return false;
			$this->db2->update($_POST['type'],array('typeid'=>$typeid));
			showmessage(L('operation_success'),'?m=yijianzhengji&c=yijianzhengji&a=list_type','', 'edit');
			
		}else{
 			$show_validator = $show_scroll = $show_header = true;
			//解出分类内容
			$info = $this->db2->get_one(array('typeid'=>$_GET['typeid']));
			if(!$info) showmessage(L('yijianzhengjitype_exit'));
			extract($info);
			include $this->admin_tpl('yijianzhengji_type_edit');
		}

	}

	/**
	 * 删除邮件  
	 * @param	intval	$sid	
	 */
	public function delete() {
  		if((!isset($_GET['yijianzhengjiid']) || empty($_GET['yijianzhengjiid'])) && (!isset($_POST['yijianzhengjiid']) || empty($_POST['yijianzhengjiid']))) {
			showmessage(L('illegal_parameters'), HTTP_REFERER);
		} else {
			if(is_array($_POST['yijianzhengjiid'])){
				foreach($_POST['yijianzhengjiid'] as $yijianzhengjiid_arr) {
 					//批量删除友情链接
					$this->db->delete(array('yijianzhengjiid'=>$yijianzhengjiid_arr));
					//更新附件状态
					if(pc_base::load_config('system','attachment_stat')) {
						$this->attachment_db = pc_base::load_model('attachment_model');
						$this->attachment_db->api_delete('yijianzhengji-'.$yijianzhengjiid_arr);
					}
				}
				showmessage(L('operation_success'),'?m=yijianzhengji&c=yijianzhengji');
			}else{
				$yijianzhengjiid = intval($_GET['yijianzhengjiid']);
				if($yijianzhengjiid < 1) return false;
				//删除友情链接
				$result = $this->db->delete(array('yijianzhengjiid'=>$yijianzhengjiid));
				//更新附件状态
				if(pc_base::load_config('system','attachment_stat')) {
					$this->attachment_db = pc_base::load_model('attachment_model');
					$this->attachment_db->api_delete('yijianzhengji-'.$yijianzhengjiid);
				}
				if($result){
					showmessage(L('operation_success'),'?m=yijianzhengji&c=yijianzhengji');
				}else {
					showmessage(L("operation_failure"),'?m=yijianzhengji&c=yijianzhengji');
				}
			}
			showmessage(L('operation_success'), HTTP_REFERER);
		}
	}
	 
	/**
	 * 邮件模块配置
	 */
	public function setting() {
		//读取配置文件
		$data = array();
 		$siteid = $this->get_siteid();//当前站点 
		//更新模型数据库,重设setting 数据. 
		$m_db = pc_base::load_model('module_model');
		$data = $m_db->select(array('module'=>'yijianzhengji'));
		$setting = string2array($data[0]['setting']);
		$now_seting = $setting[$siteid]; //当前站点配置
		if(isset($_POST['dosubmit'])) {
			//多站点存储配置文件
 			$setting[$siteid] = $_POST['setting'];
  			setcache('yijianzhengji', $setting, 'commons');  
			//更新模型数据库,重设setting 数据. 
  			$m_db = pc_base::load_model('module_model'); //调用模块数据模型
			$set = array2string($setting);
			$m_db->update(array('setting'=>$set), array('module'=>ROUTE_M));
			showmessage(L('setting_updates_successful'), '?m=yijianzhengji&c=yijianzhengji&a=init');
		} else {
			@extract($now_seting);
            $big_menu = array('?m=yijianzhengji&c=yijianzhengji&a=init', L('yijianzhengji'));     
			include $this->admin_tpl('setting');
		}
	}
	
  	//批量审核 ...
 	public function check_register(){
		if(isset($_POST['dosubmit'])) {
			if((!isset($_GET['yijianzhengjiid']) || empty($_GET['yijianzhengjiid'])) && (!isset($_POST['yijianzhengjiid']) || empty($_POST['yijianzhengjiid']))) {
				showmessage(L('illegal_parameters'), HTTP_REFERER);
			} else {
				if(is_array($_POST['yijianzhengjiid'])){//批量审核
					foreach($_POST['yijianzhengjiid'] as $yijianzhengjiid_arr) {
						$this->db->update(array('passed'=>1),array('yijianzhengjiid'=>$yijianzhengjiid_arr));
					}
					showmessage(L('operation_success'),'?m=yijianzhengji&c=yijianzhengji');
				}else{//单个审核
					$yijianzhengjiid = intval($_GET['yijianzhengjiid']);
					if($yijianzhengjiid < 1) return false;
					$result = $this->db->update(array('passed'=>1),array('yijianzhengjiid'=>$yijianzhengjiid));
					if($result){
						showmessage(L('operation_success'),'?m=yijianzhengji&c=yijianzhengji');
					}else {
						showmessage(L("operation_failure"),'?m=yijianzhengji&c=yijianzhengji');
					}
				}
			}
		}else {//读取未审核列表
			$where = array('siteid'=>$this->get_siteid(),'passed'=>0);
			$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
			$infos = $this->db->listinfo($where,'yijianzhengjiid DESC',$page, $pages = '9');
			$pages = $this->db->pages;
			$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=yijianzhengji&c=yijianzhengji&a=add\', title:\''.L('yijianzhengji_add').'\', width:\'700\', height:\'450\'}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('yijianzhengji_add'));
			include $this->admin_tpl('check_register_list');
		}
		
	}
	
 	//单个审核申请
 	public function check(){
		if((!isset($_GET['yijianzhengjiid']) || empty($_GET['yijianzhengjiid'])) && (!isset($_POST['yijianzhengjiid']) || empty($_POST['yijianzhengjiid']))) {
			showmessage(L('illegal_parameters'), HTTP_REFERER);
		} else { 
			$yijianzhengjiid = intval($_GET['yijianzhengjiid']);
			if($yijianzhengjiid < 1) return false;
			//删除邮件
			$result = $this->db->update(array('passed'=>1),array('yijianzhengjiid'=>$yijianzhengjiid));
			if($result){
				showmessage(L('operation_success'),'?m=yijianzhengji&c=yijianzhengji');
			}else {
				showmessage(L("operation_failure"),'?m=yijianzhengji&c=yijianzhengji');
			}
			 
		}
	}
	/**
	 * 说明:异步更新排序 
	 * @param  $optionid
	 */
	public function listorder_up() {
		$result = $this->db->update(array('listorder'=>'+=1'),array('yijianzhengjiid'=>$_GET['yijianzhengjiid']));
		if($result){
			echo 1;
		} else {
			echo 0;
		}
	}
	
	//更新排序
 	public function listorder() {
		if(isset($_POST['dosubmit'])) {
			foreach($_POST['listorders'] as $yijianzhengjiid => $listorder) {
				$this->db->update(array('listorder'=>$listorder),array('yijianzhengjiid'=>$yijianzhengjiid));
			}
			showmessage(L('operation_success'),HTTP_REFERER);
		} 
	}
    
	
	/**
	 * 说明:对字符串进行处理
	 * @param $string 待处理的字符串
	 * @param $isjs 是否生成JS代码
	 */
	function format_js($string, $isjs = 1){
		$string = addslashes(str_replace(array("\r", "\n"), array('', ''), $string));
		return $isjs ? 'document.write("'.$string.'");' : $string;
	}
 
 
	
}
?>