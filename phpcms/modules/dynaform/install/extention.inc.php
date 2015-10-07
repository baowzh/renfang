<?php
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');
$parentid = $menu_db->insert(array('name'=>'动态表单', 'parentid'=>10, 'm'=>'dynaform', 'c'=>'dynaform', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);
$menu_db->insert(array('name'=>'领导信箱', 'parentid'=>$parentid, 'm'=>'dynaform', 'c'=>'dynaform', 'a'=>'ldxx', 'data'=>'', 'listorder'=>0, 'display'=>'0'));

?>