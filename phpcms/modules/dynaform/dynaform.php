<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
class dynaform extends admin{
	function __construct() {
		pc_base::load_app_func('global');
		//$siteid = isset($_GET['siteid']) ? intval($_GET['siteid']) : get_siteid();
  		//define("SITEID",$siteid);
		$mail_db = pc_base::load_model(mail_model);	     //邮件库
	}
	 /**
	 *	邮件链接列表页
	 */	
	public function init() {
		/*
		$siteid = SITEID;
		$setting = getcache('mail', 'commons');  
		$SEO = seo(SITEID, '', $setting[$siteid]['sz5'], '', '');
		$pagesy = $setting[$siteid]['sz4'];     //获取每页显示数;
		if($pagesy=='0' or $pagesy==''){$pagesy = '10';}
 		$types = $this->type->get_types($siteid);//获取站点下分类
		$page = max(intval($_GET['page']),1);
		$this->db = pc_base::load_model('mail_model');
		$infos = $this->db->listinfo(array('siteid'=>$siteid),'addtime DESC',$page,$pages = "$pagesy");
		$datas = array();
		foreach($infos as $_v) {
			$datas[] = $_v;
		}
		$pages = $this->db->pages;
		include template('mail', 'index');	
		*/
	}	

	////领导信箱
	public function ldxx(){
		$this->db = pc_base::load_model('dynaform1_model');
		$siteid = SITEID;
		$page = max(intval($_GET['page']),1);
		$infos = $this->db->listinfo(array('itype'=>'ldxx'),'',$page,30);
		include $this->admin_tpl('ldxx');
	}

	//听证会
	public function tzh(){
		$this->db = pc_base::load_model('dynaform1_model');
		$siteid = SITEID;
		$page = max(intval($_GET['page']),1);
		$infos = $this->db->listinfo(array('itype'=>'tzh'),'',$page,30);
		include $this->admin_tpl('tzh');
	}


	//建言献策
	public function jyxc(){
		$this->db = pc_base::load_model('dynaform1_model');
		$siteid = SITEID;
		$page = max(intval($_GET['page']),1);
		$infos = $this->db->listinfo(array('itype'=>'jyxc'),'',$page,30);
		include $this->admin_tpl('jyxc');
	}

	//网上信访
	public function wsxf(){
		$this->db = pc_base::load_model('dynaform1_model');
		$siteid = SITEID;
		$page = max(intval($_GET['page']),1);
		$infos = $this->db->listinfo(array('itype'=>'wsxf'),'',$page,30);
		include $this->admin_tpl('wsxf');
	}

    public function delete_ldxx() {
		$this->db = pc_base::load_model('dynaform1_model');
  		if((!isset($_GET['mailid']) || empty($_GET['mailid'])) && (!isset($_POST['mailid']) || empty($_POST['mailid']))) {
			//showmessage(L('illegal_parameters'), HTTP_REFERER);
		} else {
			if(is_array($_POST['mailid'])){
				foreach($_POST['mailid'] as $mailid_arr) {
 					//批量删除友情链接
					$this->db->delete(array('id'=>$mailid_arr));
				}
				showmessage(L('operation_success'),'?m=dynaform&c=dynaform&a=ldxx');
			}else{
				$mailid = intval($_GET['mailid']);
				if($mailid < 1) return false;
				//删除友情链接
				$result = $this->db->delete(array('id'=>$mailid));
				if($result){
					showmessage(L('operation_success'),'?m=dynaform&c=dynaform&a=ldxx');
				}else {
					showmessage(L("operation_failure"),'?m=dynaform&c=dynaform&a=ldxx');
				}
			}
			showmessage(L('operation_success'), HTTP_REFERER);
		}
	}


    public function delete_tzh() {
		$this->db = pc_base::load_model('dynaform1_model');
  		if((!isset($_GET['mailid']) || empty($_GET['mailid'])) && (!isset($_POST['mailid']) || empty($_POST['mailid']))) {
			//showmessage(L('illegal_parameters'), HTTP_REFERER);
		} else {
			if(is_array($_POST['mailid'])){
				foreach($_POST['mailid'] as $mailid_arr) {
 					//批量删除友情链接
					$this->db->delete(array('id'=>$mailid_arr));
				}
				showmessage(L('operation_success'),'?m=dynaform&c=dynaform&a=ldxx');
			}else{
				$mailid = intval($_GET['mailid']);
				if($mailid < 1) return false;
				//删除友情链接
				$result = $this->db->delete(array('id'=>$mailid));
				if($result){
					showmessage(L('operation_success'),'?m=dynaform&c=dynaform&a=ldxx');
				}else {
					showmessage(L("operation_failure"),'?m=dynaform&c=dynaform&a=ldxx');
				}
			}
			showmessage(L('operation_success'), HTTP_REFERER);
		}
	}


    public function delete_wsxf() {
		$this->db = pc_base::load_model('dynaform1_model');
  		if((!isset($_GET['mailid']) || empty($_GET['mailid'])) && (!isset($_POST['mailid']) || empty($_POST['mailid']))) {
			//showmessage(L('illegal_parameters'), HTTP_REFERER);
		} else {
			if(is_array($_POST['mailid'])){
				foreach($_POST['mailid'] as $mailid_arr) {
 					//批量删除友情链接
					$this->db->delete(array('id'=>$mailid_arr));
				}
				showmessage(L('operation_success'),'?m=dynaform&c=dynaform&a=ldxx');
			}else{
				$mailid = intval($_GET['mailid']);
				if($mailid < 1) return false;
				//删除友情链接
				$result = $this->db->delete(array('id'=>$mailid));
				if($result){
					showmessage(L('operation_success'),'?m=dynaform&c=dynaform&a=ldxx');
				}else {
					showmessage(L("operation_failure"),'?m=dynaform&c=dynaform&a=ldxx');
				}
			}
			showmessage(L('operation_success'), HTTP_REFERER);
		}
	}


    public function delete_jyxc() {
		$this->db = pc_base::load_model('dynaform1_model');
  		if((!isset($_GET['mailid']) || empty($_GET['mailid'])) && (!isset($_POST['mailid']) || empty($_POST['mailid']))) {
			//showmessage(L('illegal_parameters'), HTTP_REFERER);
		} else {
			if(is_array($_POST['mailid'])){
				foreach($_POST['mailid'] as $mailid_arr) {
 					//批量删除友情链接
					$this->db->delete(array('id'=>$mailid_arr));
				}
				showmessage(L('operation_success'),'?m=dynaform&c=dynaform&a=ldxx');
			}else{
				$mailid = intval($_GET['mailid']);
				if($mailid < 1) return false;
				//删除友情链接
				$result = $this->db->delete(array('id'=>$mailid));
				if($result){
					showmessage(L('operation_success'),'?m=dynaform&c=dynaform&a=ldxx');
				}else {
					showmessage(L("operation_failure"),'?m=dynaform&c=dynaform&a=ldxx');
				}
			}
			showmessage(L('operation_success'), HTTP_REFERER);
		}
	}
	
		 /**
	 *	邮件分类链接列表页
	 */	
	public function list_type() {
		 /*
		$siteid = SITEID;
		$type_id = trim(urldecode($_GET['type_id']));
		$type_id = intval($type_id);
		$setting = getcache('mail', 'commons');  
		$pagesy = $setting[$siteid]['sz4'];     //获取每页显示数;
		if($pagesy=='0' or $pagesy==''){$pagesy = '10';}
		$SEO = seo(SITEID, '', $setting[$siteid]['sz5'], '', '');
 		$types = $this->type->get_types($siteid);//获取站点下所有分类
		$page = max(intval($_GET['page']),1);
		$this->db = pc_base::load_model('mail_model');
		$infos = $this->db->listinfo(array('siteid'=>$siteid,'typeid'=>$type_id),'addtime DESC',$page,$pages = "$pagesy");
		$datas = array();
		foreach($infos as $_v) {
			$datas[] = $_v;
		}
		$pages = $this->db->pages;
		include template('mail', 'list_type');	
		*/
	}
 		 /**
	 *	邮件查询结果明细页
	 */
	public function sg() {
	    $siteid = SITEID;
   		$setting = getcache('mail', 'commons');
		$SEO = seo(SITEID, '', $setting[$siteid]['sz5'], '', '');
		 	
 		$types = $this->type->get_types($siteid);//获取站点所有分类
  		include template('mail', 'sg');
	} 
	
	 /**
	 *	申请邮件 
	 */
	public function register() { 
 		$siteid = SITEID;
 		if(isset($_POST['dosubmit'])){
		$_POST[pass] = md5($_POST[pass]);
		//计算生成编号开始
		$showtime=date("Y");
        $sjs=(rand(100,900));
        $bh=$sjs+1000+$_POST['typeid'];
        $yjbh="$showtime$bh$sjs";
        $addtime=time();
        $ip = $_SERVER["REMOTE_ADDR"];
		//计算生成编号结束
 			if($_POST['name']==""){
 				showmessage(L('sitename_noempty'),"?m=mail&c=index&a=register&siteid=$siteid");
 			}
 			if($_POST['title']==""){
 				showmessage(L('siteurl_not_empty'),"?m=mail&c=index&a=register&siteid=$siteid");
 			}
 			if($_POST['content']==""){
 				showmessage(L('siteurl_not_empty'),"?m=mail&c=index&a=register&siteid=$siteid");
 			}
 			if($_POST['typeid']==""){
 				showmessage(L('siteurl_not_empty'),"?m=mail&c=index&a=register&siteid=$siteid");
 			}
 			if(!in_array($_POST['mailtype'],array('0','1'))){
 				$_POST['mailtype'] = '0';
 			}
			$setting = getcache('mail', 'commons');  //判断是否直接显示;
			if($setting[$siteid]['sz3']=='0'){ //是否直接通过免审显示到列表中;
			$passed = '1';
			}else{
			$passed = '0';
			}
 			$mail_db = pc_base::load_model(mail_model);	     //邮件库		
 			if($_POST['mailtype']=='0'){
 				$sql = array('passed'=>$passed,'ps'=>$_POST['ps'],'ip'=>$ip,'addtime'=>$addtime,'bh'=>$yjbh,'pass'=>$_POST['pass'],'content'=>$_POST['content'],'tel'=>$_POST['tel'],'fax'=>$_POST['fax'],'email'=>$_POST['email'],'siteid'=>$siteid,'typeid'=>$_POST['typeid'],'mailtype'=>$_POST['mailtype'],'name'=>$_POST['name'],'title'=>$_POST['title']);
 			}else{
 				$sql = array('passed'=>$passed,'ps'=>$_POST['ps'],'ip'=>$ip,'addtime'=>$addtime,'bh'=>$yjbh,'pass'=>$_POST['pass'],'content'=>$_POST['content'],'tel'=>$_POST['tel'],'fax'=>$_POST['fax'],'email'=>$_POST['email'],'siteid'=>$siteid,'typeid'=>$_POST['typeid'],'mailtype'=>$_POST['mailtype'],'name'=>$_POST['name'],'title'=>$_POST['title'],'gsmz'=>$_POST['gsmz']);
 			}
 			$mail_db->insert($sql);
 			showmessage(L('add_success'), "?m=mail&c=index&a=sg&siteid=$siteid&bh=$yjbh");
 		}else {
  			$setting = getcache('mail', 'commons');
 			if($setting[$siteid]['sz1']=='0'){
 				showmessage(L('suspend_application'), HTTP_REFERER);
 			}
 			$types = $this->type->get_types($siteid);//获取站点下所有邮件分类
 			pc_base::load_sys_class('form', '', 0);
 			$setting = getcache('mail', 'commons');
 			$SEO = seo(SITEID, '', $setting[$siteid]['sz5'], '', '');
   			include template('mail', 'register');
 		}
	} 
	
}
?>