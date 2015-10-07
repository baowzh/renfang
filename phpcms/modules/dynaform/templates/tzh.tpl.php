<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
		<td><div class="explain-col"> 
		听证会
		</div>
		</td>
		</tr>
    </tbody>
</table>
<form name="myform" id="myform" action="?m=dynaform&c=dynaform&a=listorder" method="post" >
<div class="table-list">
<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<th width="35" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('mailid[]');"></th>
			<th width="40" align="center">姓名</th>
            <th width="80" align="center">联系电话</th>
			<th>email</th>
			<th width="70" align="center">家庭住址</th>
			<th width="70" align="center">通讯地址</th>
			<th width="70" align="center">主题</th>
			<th width="100" align="center"><?php echo L('operations_manage')?></th>
		</tr>
	</thead>
<tbody>
<?php
if(is_array($infos)){
	foreach($infos as $info){
		?>
	<tr>
		<td align="center" width="80"><input type="checkbox" name="mailid[]" value="<?php echo $info['id']?>"></td>
	    <td align="center" width="80"><?php echo $info['name'];?></td>
		<td align="center"width="80"> <?php echo $info['telphone'];?></td>
		<td align="center"width="80"> <?php echo $info['email'];?></td>
		<td align="center"width="80"> <?php echo $info['address'];?></td>
		<td align="center"width="80"> <?php echo $info['mailaddress'];?></td>		
		<td align="center"         > <?php echo $info['subject'];?></td>
		<td align="center" width="100"> <a
			href='?m=dynaform&c=dynaform&a=delete_tzh&mailid=<?php echo $info['id']?>'
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
	value="<?php echo L('listorder')?>">&nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onClick="document.myform.action='?m=dynaform&c=dynaform&a=delete_tzh'" value="<?php echo L('delete')?>"/></div>
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
