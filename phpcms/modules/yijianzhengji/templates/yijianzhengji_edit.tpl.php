<?php
include $this->admin_tpl('header','admin');
?>
<script type="text/javascript">
<!--
	$(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}}); 

	$("#yijianzhengji_name").formValidator({onshow:"<?php echo L("input").L('yijianzhengji_name')?>",onfocus:"<?php echo L("input").L('yijianzhengji_name')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('yijianzhengji_name')?>"}).ajaxValidator({type : "get",url : "",data :"m=yijianzhengji&c=yijianzhengji&a=public_name&yijianzhengjiid=<?php echo $yijianzhengjiid;?>",datatype : "html",async:'false',success : function(data){	if( data == "1" ){return true;}else{return false;}},buttons: $("#dosubmit"),onerror : "<?php echo L('yijianzhengji_name').L('exists')?>",onwait : "<?php echo L('connecting')?>"}).defaultPassed(); 

	$("#yijianzhengji_url").formValidator({onshow:"<?php echo L("input").L('url')?>",onfocus:"<?php echo L("input").L('url')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('url')?>"}).regexValidator({regexp:"^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&]*([^<>])*$",onerror:"<?php echo L('yijianzhengji_onerror')?>"})
	
	})
//-->
</script>

<div class="pad_10">
<form action="?m=yijianzhengji&c=yijianzhengji&a=edit&yijianzhengjiid=<?php echo $yijianzhengjiid; ?>" method="post" name="myform" id="myform">
<table cellpadding="2" cellspacing="1" class="table_form" width="100%">


	<tr>
		<th width="20%"><?php echo L('typeid')?>：</th>
		<td><select name="yijianzhengji[typeid]" id="">
		<option value="0" <?php if($typeid=='0'){echo "selected";}?>><?php echo $setting[$siteid]['sz6']; ?></option>
		<?php
		  $i=0;
		  foreach($types as $type_key=>$type){
		  $i++;
		?>
		<option value="<?php echo $type['typeid'];?>" <?php if($type['typeid']==$typeid){echo "selected";}?>><?php echo $type['name'];?></option>
		<?php }?>
			 
		</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 提问人员IP：<?php echo $ip; ?> </td>
	</tr>
	
	<tr>
		<th>咨询类别：</th>
		<td>
<?php if($yijianzhengjitype == 1){
 echo L('pl');
 ?>&nbsp;&nbsp;&nbsp;&nbsp;
<?php }else{
 echo L('gz');
 }	
 ?>
		</td>
	</tr>
	
<?php if($yijianzhengjitype == 1){
?>	
<tr> 
<th>公司名称：</th>
<td><?php echo $gsmz; ?></td>
</tr>
<?php
}
?>
<tr> 
<th>咨询人姓名：</th>
<td><?php echo $name; ?></td>
</tr>
<tr>
<th>联系电话：</th>
<td><?php echo $tel; ?></td>
</tr>
<tr>
<th>传真号码：</th>
<td><?php echo $fax; ?></td>
</tr>
<tr>
<th>电子邮件：</th>
<td><?php echo $email; ?></td>
</tr>
<tr> 
<th>咨询标题：</th>
<td><?php echo $title; ?></td>
</tr>
<tr> 
<th>咨询内容：</th>
<td><?php echo $content; ?></td>
</tr>
<tr> 
<th>回复内容：</th>
<td><textarea name="yijianzhengji[hgcontent]" style='width:94%;height:80px;' ><?php echo $hgcontent; ?></textarea></td>
</tr>
 <input type="hidden" name="yijianzhengji[hftime]" value="<?php echo time();?>" class="input-text">
	<tr>
		<th><?php echo L('elite')?>：</th>
		<td><input name="yijianzhengji[elite]" type="radio" value="1" <?php if($elite==1){echo "checked";}?>>&nbsp;<?php echo L('yes')?>&nbsp;&nbsp;<input
			name="yijianzhengji[elite]" type="radio" value="0" <?php if($elite==0){echo "checked";}?>>&nbsp;<?php echo L('no')?></td>
	</tr>
	 
	<tr>
		<th><?php echo L('passed')?>：</th>
		<td><input name="yijianzhengji[passed]" type="radio" value="1" <?php if($passed==1){echo "checked";}?>>&nbsp;<?php echo L('yes')?>&nbsp;&nbsp;<input
			name="yijianzhengji[passed]" type="radio" value="0" <?php if($passed==0){echo "checked";}?>>&nbsp;<?php echo L('no')?></td>
	</tr>
<tr> 
<th>是否公开</th>
<td><?php if($ps=='0'){echo '公开';}else{ echo '保密';}?>
</td>
</tr>
<tr>
		<th></th>
		<td> <input
		type="submit" name="dosubmit" id="dosubmit" class="dialog"
		value=" <?php echo L('submit')?> "></td>
	</tr>

</table>
</form>
</div>
</body>
</html>

