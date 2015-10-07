<?php
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');
$parentid = $menu_db->insert(array('name'=>'ysqgk', 'parentid'=>10, 'm'=>'ysqgk', 'c'=>'ysqgk', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);
$menu_db->insert(array('name'=>'edit_ysqgk', 'parentid'=>$parentid, 'm'=>'ysqgk', 'c'=>'ysqgk', 'a'=>'edit', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
$menu_db->insert(array('name'=>'delete_ysqgk', 'parentid'=>$parentid, 'm'=>'ysqgk', 'c'=>'ysqgk', 'a'=>'delete', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
$menu_db->insert(array('name'=>'ysqgk_setting', 'parentid'=>$parentid, 'm'=>'ysqgk', 'c'=>'ysqgk', 'a'=>'setting', 'data'=>'', 'listorder'=>0, 'display'=>'1'));
$menu_db->insert(array('name'=>'add_type', 'parentid'=>$parentid, 'm'=>'ysqgk', 'c'=>'ysqgk', 'a'=>'add_type', 'data'=>'', 'listorder'=>0, 'display'=>'1'));
$menu_db->insert(array('name'=>'list_type', 'parentid'=>$parentid, 'm'=>'ysqgk', 'c'=>'ysqgk', 'a'=>'list_type', 'data'=>'', 'listorder'=>0, 'display'=>'1'));

$language = array('ysqgk'=>'互动-依申请公开', 'edit_ysqgk'=>'回复', 'delete_ysqgk'=>'删除', 'ysqgk_setting'=>'依申请公开配置', 'add_type'=>'添加受理单位/部门', 'list_type'=>'受理单位/部门管理');
?>