﻿<?php
defined('IN_PHPCMS') or exit('No permission resources.');
class index {
	function __construct() {
		pc_base::load_app_func('global');
		$siteid = isset($_GET['siteid']) ? intval($_GET['siteid']) : get_siteid();
  		define("SITEID",$siteid);
		$this->type = pc_base::load_model('type_model'); //分类库
		$ysqgk_db = pc_base::load_model(ysqgk_model);	     //邮件库
		$setting = getcache('ysqgk', 'commons');  
 		if($setting[$siteid]['sz1']=='0'){    //判断是否开启信箱;
 				showmessage(L('suspend_application'), HTTP_REFERER);
 			}
	}
	 /**
	 *	邮件链接列表页
	 */	
	public function init() {
		$siteid = SITEID;
		$setting = getcache('ysqgk', 'commons');  
		$SEO = seo(SITEID, '', $setting[$siteid]['sz5'], '', '');
		$pagesy = $setting[$siteid]['sz4'];     //获取每页显示数;
		if($pagesy=='0' or $pagesy==''){$pagesy = '10';}
 		$types = $this->type->get_types($siteid);//获取站点下分类
		$page = max(intval($_GET['page']),1);
		$this->db = pc_base::load_model('ysqgk_model');
		$infos = $this->db->listinfo(array('siteid'=>$siteid),'addtime DESC',$page,$pages = "$pagesy");
		$datas = array();
		foreach($infos as $_v) {
			$datas[] = $_v;
		}
		$pages = $this->db->pages;
		include template('ysqgk', 'index');	
	}	
	
		 /**
	 *	邮件分类链接列表页
	 */	
	public function list_type() {
		$siteid = SITEID;
		$type_id = trim(urldecode($_GET['type_id']));
		$type_id = intval($type_id);
		$setting = getcache('ysqgk', 'commons');  
		$pagesy = $setting[$siteid]['sz4'];     //获取每页显示数;
		if($pagesy=='0' or $pagesy==''){$pagesy = '10';}
		$SEO = seo(SITEID, '', $setting[$siteid]['sz5'], '', '');
 		$types = $this->type->get_types($siteid);//获取站点下所有分类
		$page = max(intval($_GET['page']),1);
		$this->db = pc_base::load_model('ysqgk_model');
		$infos = $this->db->listinfo(array('siteid'=>$siteid,'typeid'=>$type_id),'addtime DESC',$page,$pages = "$pagesy");
		$datas = array();
		foreach($infos as $_v) {
			$datas[] = $_v;
		}
		$pages = $this->db->pages;
		include template('ysqgk', 'list_type');	
	}
 		 /**
	 *	邮件查询结果明细页
	 */
	public function sg() {
	    $siteid = SITEID;
   		$setting = getcache('ysqgk', 'commons');
		$SEO = seo(SITEID, '', $setting[$siteid]['sz5'], '', '');
		 	
 		$types = $this->type->get_types($siteid);//获取站点所有分类
  		include template('ysqgk', 'sg');
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
 			
 			if($_POST['typeid']==""){
 				showmessage(L('siteurl_not_empty'),"?m=ysqgk&c=index&a=register&siteid=$siteid");
 			}
 			if(!in_array($_POST['ysqgktype'],array('0','1'))){
 				$_POST['ysqgktype'] = '0';
 			}
			$setting = getcache('ysqgk', 'commons');  //判断是否直接显示;
			if($setting[$siteid]['sz3']=='0'){ //是否直接通过免审显示到列表中;
			$passed = '1';
			}else{
			$passed = '0';
			}
 			$ysqgk_db = pc_base::load_model(ysqgk_model);	     //邮件库		
 			if($_POST['ysqgktype']=='0'){
 				$sql = array('passed'=>$passed,'ps'=>$_POST['ps'],'ip'=>$ip,'addtime'=>$addtime,'bh'=>$yjbh,'pass'=>$_POST['pass'],'content'=>$_POST['content'],'tel'=>$_POST['tel'],'fax'=>$_POST['fax'],'email'=>$_POST['email'],'siteid'=>$siteid,'xinxifangshi'=>$_POST['xinxifangshi'],'huoqufangshi'=>$_POST['huoqufangshi'],'zhengjianming'=>$_POST['zhengjianming'],'zhengjianhao'=>$_POST['zhengjianhao'],'dizhi'=>$_POST['dizhi'],'youbian'=>$_POST['youbian'],'lianxiren'=>$_POST['lianxiren'],'frdaibiao'=>$_POST['frdaibiao'],'danwei'=>$_POST['danwei'],'zhizhao'=>$_POST['zhizhao'],'zzjg'=>$_POST['zzjg'],'yongtu'=>$_POST['yongtu'],'dizhib'=>$_POST['dizhib'],'youbianb'=>$_POST['youbianb'],'telb'=>$_POST['telb'],'faxb'=>$_POST['faxb'],'emailb'=>$_POST['emailb'],'typeid'=>$_POST['typeid'],'ysqgktype'=>$_POST['ysqgktype'],'name'=>$_POST['name'],'title'=>$_POST['title']);
 			}else{
 				$sql = array('passed'=>$passed,'ps'=>$_POST['ps'],'ip'=>$ip,'addtime'=>$addtime,'bh'=>$yjbh,'pass'=>$_POST['pass'],'content'=>$_POST['content'],'tel'=>$_POST['tel'],'fax'=>$_POST['fax'],'email'=>$_POST['email'],'siteid'=>$siteid,'xinxifangshi'=>$_POST['xinxifangshi'],'huoqufangshi'=>$_POST['huoqufangshi'],'zhengjianming'=>$_POST['zhengjianming'],'zhengjianhao'=>$_POST['zhengjianhao'],'dizhi'=>$_POST['dizhi'],'youbian'=>$_POST['youbian'],'lianxiren'=>$_POST['lianxiren'],'frdaibiao'=>$_POST['frdaibiao'],'danwei'=>$_POST['danwei'],'zhizhao'=>$_POST['zhizhao'],'zzjg'=>$_POST['zzjg'],'yongtu'=>$_POST['yongtu'],'dizhib'=>$_POST['dizhib'],'youbianb'=>$_POST['youbianb'],'telb'=>$_POST['telb'],'faxb'=>$_POST['faxb'],'emailb'=>$_POST['emailb'],'typeid'=>$_POST['typeid'],'ysqgktype'=>$_POST['ysqgktype'],'name'=>$_POST['name'],'title'=>$_POST['title'],'gsmz'=>$_POST['gsmz']);
 			}
 			$ysqgk_db->insert($sql);
 			showmessage(L('add_success'), "?m=ysqgk&c=index&a=sg&siteid=$siteid&bh=$yjbh");
 		}else {
  			$setting = getcache('ysqgk', 'commons');
 			if($setting[$siteid]['sz1']=='0'){
 				showmessage(L('suspend_application'), HTTP_REFERER);
 			}
 			$types = $this->type->get_types($siteid);//获取站点下所有邮件分类
 			pc_base::load_sys_class('form', '', 0);
 			$setting = getcache('ysqgk', 'commons');
 			$SEO = seo(SITEID, '', $setting[$siteid]['sz5'], '', '');
   			include template('ysqgk', 'register');
 		}
	} 
	
}
?>