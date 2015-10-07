﻿<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
		<td><div class="explain-col"> 
		<?php echo L('all_ysqgktype')?>: &nbsp;&nbsp; <a href="?m=ysqgk&c=ysqgk"><?php echo L('all')?></a> &nbsp;&nbsp;
		<a href="?m=ysqgk&c=ysqgk&typeid=0"><?php echo $setting[$siteid]['sz6']; ?></a>&nbsp;
		<?php
	if(is_array($type_arr)){
	foreach($type_arr as $typeid => $type){
		?><a href="?m=ysqgk&c=ysqgk&typeid=<?php echo $typeid;?>"><?php echo $type;?></a>&nbsp;
		<?php }}?>
		</div>
		</td>
		</tr>
    </tbody>
</table>
<form name="myform" id="myform" action="?m=ysqgk&c=ysqgk&a=listorder" method="post" >
<div class="table-list">
<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<th width="35" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('ysqgkid[]');"></th>
			<th width="35" align="center"><?php echo L('listorder')?></th>
			<th width="110" align="center">申请人类型</th>
            <th width="80" align="center">受理编号</th>
			<th>标题</th>
			<th width="70" align="center">申请时间</th>
			<th width="70" align="center">受理时间</th>
			<th width="70" align="center">申请人</th>
			<th width="80" align="center">受理单位</th>
			<th width="100" align="center"><?php echo L('operations_manage')?></th>
		</tr>
	</thead>
<tbody>
<?php
if(is_array($infos)){
	foreach($infos as $info){
		?>
	<tr>
		<td align="center" width="35"><input type="checkbox" name="ysqgkid[]" value="<?php echo $info['ysqgkid']?>"></td>
		<td align="center" width="35"><input name='listorders[<?php echo $info['ysqgkid']?>]' type='text' size='3' value='<?php echo $info['listorder']?>' class="input-text-c"></td>
	    <td align="center" width="110"><?php if($info['ysqgktype']==0){?>公民<?php }else{?>法人/其他组织<?php }?></td>
		<td width="80" align="center"><a href="#"
			onclick="edit(<?php echo $info['ysqgkid']?>, '<?php echo new_addslashes($info['name'])?>')"
			title="<?php echo L('ysqgk_edit')?>"><?php echo $info['bh']?></a> </td>
		<td>&nbsp;<img src="/statics/images/ybsds/ico_1.jpg" width="10" height="11" />&nbsp;<a href="###"
			onclick="edit(<?php echo $info['ysqgkid']?>, '<?php echo new_addslashes($info['name'])?>')"
			title="<?php echo L('ysqgk_edit')?>"><?php echo $info['title']?></a> </td>
		<td align="center" width="70"><?php echo  date("Y-m-d",$info['addtime'])?></td>
		<td align="center" width="70"><?php if($info['hftime']==0){echo '<font color=red>等待受理</font>';}else{echo date("Y-m-d",$info['hftime']);}?></td>
		<td align="center" width="70"><?php if($info['ysqgktype']==0){?><?php echo  $info['name']?><?php }else{?><?php echo  $info['frdaibiao']?><?php }?></td>
		<td align="center" width="80"><?php if($info['typeid']=='0'){ echo $setting[$siteid]['sz6'];}else{echo $type_arr[$info['typeid']];} ?></td>
		<td align="center" width="100"><a href="###"
			onclick="edit(<?php echo $info['ysqgkid']?>, '<?php echo new_addslashes($info['name'])?>')"
			title="<?php echo L('ysqgk_edit')?>">回复</a> | <a
			href='?m=ysqgk&c=ysqgk&a=delete&ysqgkid=<?php echo $info['ysqgkid']?>'
			onClick="return confirm('<?php echo L('confirm', array('message' => new_addslashes($info['name'])))?>')"><?php echo L('delete')?></a>		</td>
	</tr>
	<?php
	}
}
?>
</tbody>
</table>
</div>
<div class="btn"> 
<input name="dosubmit" type="submit" class="button"
	value="<?php echo L('listorder')?>">&nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onClick="document.myform.action='?m=ysqgk&c=ysqgk&a=delete'" value="<?php echo L('delete')?>"/></div>
<div id="pages"><?php echo $pages?></div>
</form>
</div>
<script type="text/javascript">

function edit(id, name) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit')?> '+name+' ',id:'edit',iframe:'?m=ysqgk&c=ysqgk&a=edit&ysqgkid='+id,width:'700',height:'450'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
function checkuid() {
	var ids='';
	$("input[name='ysqgkid[]']:checked").each(function(i, n){
		ids += $(n).val() + ',';
	});
	if(ids=='') {
		window.top.art.dialog({content:"<?php echo L('before_select_operations')?>",lock:true,width:'200',height:'50',time:1.5},function(){});
		return false;
	} else {
		myform.submit();
	}
}
//向下移动
function listorder_up(id) {
	$.get('?m=ysqgk&c=ysqgk&a=listorder_up&ysqgkid='+id,null,function (msg) { 
	if (msg==1) { 
	//$("div [id=\'option"+id+"\']").remove(); 
		alert('<?php echo L('move_success')?>');
	} else {
	alert(msg); 
	} 
	}); 
} 
</script>
</body>
</html>
