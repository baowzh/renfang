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
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>phpcmsV9 - 后台管理中心</title>
<link href="http://www.imwalk.org/tmt_temp/statics/css/reset.css" rel="stylesheet" type="text/css" />
<link href="http://www.imwalk.org/tmt_temp/statics/css/zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="http://www.imwalk.org/tmt_temp/statics/css/table_form.css" rel="stylesheet" type="text/css" />
<link href="http://www.imwalk.org/tmt_temp/statics/css/dialog.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="http://www.imwalk.org/tmt_temp/statics/js/dialog.js"></script>
	<link rel="stylesheet" type="text/css" href="http://www.imwalk.org/tmt_temp/statics/css/style/zh-cn-styles1.css" title="styles1" media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="http://www.imwalk.org/tmt_temp/statics/css/style/zh-cn-styles2.css" title="styles2" media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="http://www.imwalk.org/tmt_temp/statics/css/style/zh-cn-styles3.css" title="styles3" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="http://www.imwalk.org/tmt_temp/statics/css/style/zh-cn-styles4.css" title="styles4" media="screen" />
<script language="javascript" type="text/javascript" src="http://www.imwalk.org/tmt_temp/statics/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="http://www.imwalk.org/tmt_temp/statics/js/admin_common.js"></script>
<script language="javascript" type="text/javascript" src="http://www.imwalk.org/tmt_temp/statics/js/styleswitch.js"></script>
<script type="text/javascript">
	window.focus();
	var pc_hash = 'kcWMl1';
	</script>
</head>
<body>
<style type="text/css">
	html{_overflow-y:scroll}
</style><div id="closeParentTime" style="display:none"></div>
<SCRIPT LANGUAGE="JavaScript">
<!--
	if(window.top.$("#current_pos").data('clicknum')==1 || window.top.$("#current_pos").data('clicknum')==null) {
	parent.document.getElementById('display_center_id').style.display='';
	parent.document.getElementById('center_frame').src = '?m=content&c=content&a=public_categorys&type=add&menuid=822&pc_hash=kcWMl1';
	window.top.$("#current_pos").data('clicknum',0);
}
$(document).ready(function(){
	setInterval(closeParent,5000);
});
function closeParent() {
	if($('#closeParentTime').html() == '') {
		window.top.$(".left_menu").addClass("left_menu_on");
		window.top.$("#openClose").addClass("close");
		window.top.$("html").addClass("on");
		$('#closeParentTime').html('1');
		window.top.$("#openClose").data('clicknum',1);
	}
}
//-->
</SCRIPT>
<div class="pad-10">
<div class="content-menu ib-a blue line-x">
<a class="add fb" href="javascript:;" onclick=javascript:openwinx('?m=content&c=content&a=add&menuid=&catid=22&pc_hash=kcWMl1','')><em>添加内容</em></a>　
<a href="?m=content&c=content&a=init&catid=22&pc_hash=kcWMl1" class=on><em>审核通过</em></a><span>|</span>
 <a href="javascript:;" onclick="javascript:$('#searchid').css('display','');"><em>搜索</em></a> 
</div>
<div id="searchid" style="display:none">
<form name="searchform" action="" method="get" >
<input type="hidden" value="content" name="m">
<input type="hidden" value="content" name="c">
<input type="hidden" value="init" name="a">
<input type="hidden" value="22" name="catid">
<input type="hidden" value="0" name="steps">
<input type="hidden" value="1" name="search">
<input type="hidden" value="kcWMl1" name="pc_hash">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
		<td>
		<div class="explain-col">
 
				添加时间：
				<link rel="stylesheet" type="text/css" href="http://www.imwalk.org/tmt_temp/statics/js/calendar/jscal2.css"/>
			<link rel="stylesheet" type="text/css" href="http://www.imwalk.org/tmt_temp/statics/js/calendar/border-radius.css"/>
			<link rel="stylesheet" type="text/css" href="http://www.imwalk.org/tmt_temp/statics/js/calendar/win2k.css"/>
			<script type="text/javascript" src="http://www.imwalk.org/tmt_temp/statics/js/calendar/calendar.js"></script>
			<script type="text/javascript" src="http://www.imwalk.org/tmt_temp/statics/js/calendar/lang/en.js"></script><input type="text" name="start_time" id="start_time" value="" size="10" class="date" readonly>&nbsp;<script type="text/javascript">
			Calendar.setup({
			weekNumbers: false,
		    inputField : "start_time",
		    trigger    : "start_time",
		    dateFormat: "%Y-%m-%d",
		    showTime: false,
		    minuteStep: 1,
		    onSelect   : function() {this.hide();}
			});
        </script>- &nbsp;<input type="text" name="end_time" id="end_time" value="" size="10" class="date" readonly>&nbsp;<script type="text/javascript">
			Calendar.setup({
			weekNumbers: false,
		    inputField : "end_time",
		    trigger    : "end_time",
		    dateFormat: "%Y-%m-%d",
		    showTime: false,
		    minuteStep: 1,
		    onSelect   : function() {this.hide();}
			});
        </script>				
				<select name="posids"><option value='' selected>全部</option>
				<option value="1" >推荐</option>
				<option value="2" >不推荐</option>
				</select>				
				<select name="searchtype">
					<option value='0' selected>标题</option>
					<option value='1' >简介</option>
					<option value='2' >用户名</option>
					<option value='3' >ID</option>
				</select>
				
				<input name="keyword" type="text" value="" class="input-text" />
				<input type="submit" name="search" class="button" value="搜索" />
	</div>
		</td>
		</tr>
    </tbody>
</table>
</form>
</div>
<form name="myform" id="myform" action="" method="post" >
<div class="table-list">
    <table width="100%">
        <thead>
            <tr>
			 <th width="16"><input type="checkbox" value="" id="check_box" onclick="selectall('ids[]');"></th>
            <th width="37">排序</th>
            <th width="40">ID</th>
			<th>标题</th>
            <th width="40">点击量</th>
            <th width="70">发布人</th>
            <th width="118">更新时间</th>
			<th width="72">管理操作</th>
            </tr>
        </thead>
<tbody>
            <tr>
		<td align="center"><input class="inputcheckbox " name="ids[]" value="796" type="checkbox"></td>
        <td align='center'><input name='listorders[796]' type='text' size='3' value='0' class='input-text-c'></td>
		<td align='center' >796</td>
		<td>
		<a href="http://www.imwalk.org/tmt_temp/index.php?m=content&c=index&a=show&catid=22&id=796" target="_blank"><span style="" >土默特左旗人民政府关于本级行政执法机构通知的公示</span></a> </td>
		<td align='center' title="今日点击：0&#10;昨日点击：&#10;本周点击：0&#10;本月点击：0">0</td>
		<td align='center'>
		admin</td>
		<td align='center'>2012-07-27 00:00:00</td>
		<td align='center'><a href="javascript:;" onclick="javascript:openwinx('?m=content&c=content&a=edit&catid=22&id=796','')">修改</a> | <a href="javascript:view_comment('content_22-796-1','土默特左旗人民政府关于本级行政执法机构通知的公示')">评论</a></td>
	</tr>
            
            
     </tbody>
     </table>
    <div class="btn"><label for="check_box">全选/取消</label>
		<input type="hidden" value="kcWMl1" name="pc_hash">
    	<input type="button" class="button" value="排序" onclick="myform.action='?m=content&c=content&a=listorder&dosubmit=1&catid=22&steps=0';myform.submit();"/>
				<input type="button" class="button" value="删除" onclick="myform.action='?m=content&c=content&a=delete&dosubmit=1&catid=22&steps=0';return confirm_delete()"/>
				<input type="button" class="button" value="推送" onclick="push();"/>
				<input type="button" class="button" value="批量移动" onclick="myform.action='?m=content&c=content&a=remove&catid=22';myform.submit();"/>
			</div>
    <div id="pages"><a class="a1">50条</a> <a href="http://www.imwalk.org/tmt_temp/index.php?m=content&c=content&a=init&menuid=822&catid=22&pc_hash=kcWMl1&page=0" class="a1">上一页</a> <span>1</span> <a href="http://www.imwalk.org/tmt_temp/index.php?m=content&c=content&a=init&menuid=822&catid=22&pc_hash=kcWMl1&page=2">2</a> <a href="http://www.imwalk.org/tmt_temp/index.php?m=content&c=content&a=init&menuid=822&catid=22&pc_hash=kcWMl1&page=3">3</a> <a href="http://www.imwalk.org/tmt_temp/index.php?m=content&c=content&a=init&menuid=822&catid=22&pc_hash=kcWMl1&page=2" class="a1">下一页</a></div>
</div>
</form>
</div>
<script language="javascript" type="text/javascript" src="http://www.imwalk.org/tmt_temp/statics/js/cookie.js"></script>
<script type="text/javascript"> 
<!--
function push() {
	var str = 0;
	var id = tag = '';
	$("input[name='ids[]']").each(function() {
		if($(this).attr('checked')==true) {
			str = 1;
			id += tag+$(this).val();
			tag = '|';
		}
	});
	if(str==0) {
		alert('您没有勾选信息');
		return false;
	}
	window.top.art.dialog({id:'push'}).close();
	window.top.art.dialog({title:'推送：',id:'push',iframe:'?m=content&c=push&action=position_list&catid=22&modelid=1&id='+id,width:'800',height:'500'}, function(){var d = window.top.art.dialog({id:'push'}).data.iframe;// 使用内置接口获取iframe对象
	var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'push'}).close()});
}
function confirm_delete(){
	if(confirm('确认删除吗？')) $('#myform').submit();
}
function view_comment(id, name) {
	window.top.art.dialog({id:'view_comment'}).close();
	window.top.art.dialog({yesText:'关闭',title:'查看评论：'+name,id:'view_comment',iframe:'index.php?m=comment&c=comment_admin&a=lists&show_center_id=1&commentid='+id,width:'800',height:'500'}, function(){window.top.art.dialog({id:'edit'}).close()});
}
function reject_check(type) {
	if(type==1) {
		var str = 0;
		$("input[name='ids[]']").each(function() {
			if($(this).attr('checked')==true) {
				str = 1;
			}
		});
		if(str==0) {
			alert('您没有勾选信息');
			return false;
		}
		document.getElementById('myform').action='?m=content&c=content&a=pass&catid=22&steps=0&reject=1';
		document.getElementById('myform').submit();
	} else {
		$('#reject_content').css('display','');
		return false;
	}	
}
setcookie('refersh_time', 0);
function refersh_window() {
	var refersh_time = getcookie('refersh_time');
	if(refersh_time==1) {
		window.location.reload();
	}
}
setInterval("refersh_window()", 3000);
//-->
</script>
</body>
</html>

