<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
		<td><div class="explain-col"> 
		<?php echo L('all_mailtype')?>: &nbsp;&nbsp; <a href="?m=mail&c=mail"><?php echo L('all')?></a> &nbsp;&nbsp;
		<a href="?m=mail&c=mail&typeid=0"><?php echo $setting[$siteid]['sz6']; ?></a>&nbsp;
		<?php
	if(is_array($type_arr)){
	foreach($type_arr as $typeid => $type){
		?><a href="?m=mail&c=mail&typeid=<?php echo $typeid;?>"><?php echo $type;?></a>&nbsp;
		<?php }}?>
		</div>
		</td>
		</tr>
    </tbody>
</table>
<form name="myform" id="myform" action="?m=mail&c=mail&a=listorder" method="post" >
<div class="table-list">
<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<th width="35" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('mailid[]');"></th>
			<th width="35" align="center"><?php echo L('listorder')?></th>
			<th width="40" align="center">类型</th>
            <th width="80" align="center"><?php echo L('mail_bh')?></th>
			<th><?php echo L('mail_title')?></th>
			<th width="70" align="center"><?php echo L('mail_add')?></th>
			<th width="70" align="center"><?php echo L('mail_hf')?></th>
			<th width="70" align="center"><?php echo L('mail_name')?></th>
			<th width="80" align="center"><?php echo L('typeid')?></th>
			<th width='80' align="center"><?php echo L('mail_tel')?></th>
			<th width="40" align="center"><?php echo L('status')?></th>
			<th width="100" align="center"><?php echo L('operations_manage')?></th>
		</tr>
	</thead>
<tbody>
<?php
if(is_array($infos)){
	foreach($infos as $info){
		?>
	<tr>
		<td align="center" width="35"><input type="checkbox" name="mailid[]" value="<?php echo $info['mailid']?>"></td>
		<td align="center" width="35"><input name='listorders[<?php echo $info['mailid']?>]' type='text' size='3' value='<?php echo $info['listorder']?>' class="input-text-c"></td>
	    <td align="center" width="40"><?php if($info['mailtype']==1){?>企业<?php }else{?>个人<?php }?></td>
		<td width="80"><a href="###"
			onclick="edit(<?php echo $info['mailid']?>, '<?php echo new_addslashes($info['name'])?>')"
			title="<?php echo L('mail_edit')?>"><?php echo $info['bh']?></a> </td>
		<td><a href="###"
			onclick="edit(<?php echo $info['mailid']?>, '<?php echo new_addslashes($info['name'])?>')"
			title="<?php echo L('mail_edit')?>"><?php echo $info['title']?></a> </td>
		<td align="center" width="70"><?php echo  date("Y-m-d",$info['addtime'])?></td>
		<td align="center" width="70"><?php if($info['hftime']==0){echo '<font color=red>没有回复</font>';}else{echo date("Y-m-d",$info['hftime']);}?></td>
		<td align="center" width="70"><?php echo  $info['name']?></td>
		<td align="center" width="80"><?php if($info['typeid']=='0'){ echo $setting[$siteid]['sz6'];}else{echo $type_arr[$info['typeid']];} ?></td>
		<td align="center" width="80"><?php echo $info['tel']?></td>
		<td width="40" align="center"><?php if($info['passed']=='0'){?><a
			href='?m=mail&c=mail&a=check&mailid=<?php echo $info['mailid']?>'
			onClick="return confirm('<?php echo L('pass_or_not')?>')"><font color=red><?php echo L('audit')?></font></a><?php }elseif($info[hgcontent]!='' and $info[passed]!=''){echo '已回复';}else{echo L('passed');}?></td>
		<td align="center" width="100"><a href="###"
			onclick="edit(<?php echo $info['mailid']?>, '<?php echo new_addslashes($info['name'])?>')"
			title="<?php echo L('mail_edit')?>"><?php echo L('mail_edit')?></a> |  <a
			href='?m=mail&c=mail&a=delete&mailid=<?php echo $info['mailid']?>'
			onClick="return confirm('<?php echo L('confirm', array('message' => new_addslashes($info['name'])))?>')"><?php echo L('delete')?></a> 
		</td>
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
	value="<?php echo L('listorder')?>">&nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onClick="document.myform.action='?m=mail&c=mail&a=delete'" value="<?php echo L('delete')?>"/></div>
<div id="pages"><?php echo $pages?></div>
</form>
</div>
<script type="text/javascript">

function edit(id, name) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit')?> '+name+' ',id:'edit',iframe:'?m=mail&c=mail&a=edit&mailid='+id,width:'700',height:'450'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
function checkuid() {
	var ids='';
	$("input[name='mailid[]']:checked").each(function(i, n){
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
	$.get('?m=mail&c=mail&a=listorder_up&mailid='+id,null,function (msg) { 
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
