<?php
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');
$parentid = $menu_db->insert(array('name'=>'yijianzhengji', 'parentid'=>10, 'm'=>'yijianzhengji', 'c'=>'yijianzhengji', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);
$menu_db->insert(array('name'=>'edit_yijianzhengji', 'parentid'=>$parentid, 'm'=>'yijianzhengji', 'c'=>'yijianzhengji', 'a'=>'edit', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
$menu_db->insert(array('name'=>'delete_yijianzhengji', 'parentid'=>$parentid, 'm'=>'yijianzhengji', 'c'=>'yijianzhengji', 'a'=>'delete', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
$menu_db->insert(array('name'=>'yijianzhengji_setting', 'parentid'=>$parentid, 'm'=>'yijianzhengji', 'c'=>'yijianzhengji', 'a'=>'setting', 'data'=>'', 'listorder'=>0, 'display'=>'1'));
$menu_db->insert(array('name'=>'add_type', 'parentid'=>$parentid, 'm'=>'yijianzhengji', 'c'=>'yijianzhengji', 'a'=>'add_type', 'data'=>'', 'listorder'=>0, 'display'=>'1'));
$menu_db->insert(array('name'=>'list_type', 'parentid'=>$parentid, 'm'=>'yijianzhengji', 'c'=>'yijianzhengji', 'a'=>'list_type', 'data'=>'', 'listorder'=>0, 'display'=>'1'));

$language = array('yijianzhengji'=>'意见征集', 'edit_yijianzhengji'=>'回复信息', 'delete_yijianzhengji'=>'删除信息', 'yijianzhengji_setting'=>'模块配置', 'add_type'=>'添加分类', 'list_type'=>'分类管理');
?>