﻿<?php
include $this->admin_tpl('header','admin');
?>
<script type="text/javascript">
<!--
	$(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}}); 

	$("#ysqgk_name").formValidator({onshow:"<?php echo L("input").L('ysqgk_name')?>",onfocus:"<?php echo L("input").L('ysqgk_name')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('ysqgk_name')?>"}).ajaxValidator({type : "get",url : "",data :"m=ysqgk&c=ysqgk&a=public_name&ysqgkid=<?php echo $ysqgkid;?>",datatype : "html",async:'false',success : function(data){	if( data == "1" ){return true;}else{return false;}},buttons: $("#dosubmit"),onerror : "<?php echo L('ysqgk_name').L('exists')?>",onwait : "<?php echo L('connecting')?>"}).defaultPassed(); 

	$("#ysqgk_url").formValidator({onshow:"<?php echo L("input").L('url')?>",onfocus:"<?php echo L("input").L('url')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('url')?>"}).regexValidator({regexp:"^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&]*([^<>])*$",onerror:"<?php echo L('ysqgk_onerror')?>"})
	
	})
//-->
</script>

<div class="pad_10">
<form action="?m=ysqgk&c=ysqgk&a=edit&ysqgkid=<?php echo $ysqgkid; ?>" method="post" name="myform" id="myform">
<?php if($info['ysqgktype']==0){?>
<table cellpadding="0" cellspacing="1" class="table_form" width="100%">


	<tr>
		<th width="15%" height="20" align="center"><?php echo L('typeid')?>：</th>
		<td><select name="ysqgk[typeid]" id="">
		<option value="0" <?php if($typeid=='0'){echo "selected";}?>><?php echo $setting[$siteid]['sz6']; ?></option>
		<?php
		  $i=0;
		  foreach($types as $type_key=>$type){
		  $i++;
		?>
		<option value="<?php echo $type['typeid'];?>" <?php if($type['typeid']==$typeid){echo "selected";}?>><?php echo $type['name'];?></option>
		<?php }?>
			 
		</select> 
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 申请人IP：<?php echo $ip; ?> </td>
	</tr>
	
	<tr>
		<th height="20" align="center" style="color:#000000; font-weight:bold;">申请人类型：</th>
		<td style="color:#666666; font-weight:bold;">&nbsp;
<?php if($ysqgktype == 1){
 echo L('pl');
 ?>
<?php }else{
 echo L('gz');
 }	
 ?></td>
	</tr>
	
<tr> 
<th height="20" align="center" style="color:#000000; font-weight:bold;">受理编号：</th>
<td style="color:#666666; font-weight:bold;">&nbsp;&nbsp;<?php echo $bh; ?></td>
</tr>
<tr> 
<th height="20" align="center" style="color:#000000; font-weight:bold;">申请时间：</th>
<td style="color:#666666; font-weight:bold;">&nbsp;&nbsp;<?php echo  date("Y-m-d",$info['addtime'])?></td>
</tr>
<tr>
<th height="20" align="center" style="border-top:solid 3px #FFBE7A;color:#000000">姓　　名：</th>
<td style="border-top:solid 3px #FFBE7A;color:#666666">&nbsp;&nbsp;<?php echo $name; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">工作单位：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $danwei; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">证件名称：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $zhengjianming; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">证件号码：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $zhengjianhao; ?></td>
</tr>
<tr>
<th height="20" align="center" style="border-top:solid 3px #FFBE7A;color:#000000">联系地址：</th>
<td style="border-top:solid 3px #FFBE7A;color:#666666">&nbsp;&nbsp;<?php echo $dizhi; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">邮政编码：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $youbian; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">联系电话：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $tel; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">传　　真：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $fax; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">电子邮箱：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $email; ?></td>
</tr>
<tr> 
<th height="20" align="center" style="border-top:solid 3px #FFBE7A;color:#000000">标<span style="color:#000000">　　</span>题：</th>
<td style="border-top:solid 3px #FFBE7A; font-weight:bold">&nbsp;&nbsp;<?php echo $title; ?></td>
</tr>
<tr> 
<th height="20" align="center" style="color:#000000">申请人所需内容描述：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $content; ?></td>
</tr>
<tr> 
<th height="20" align="center" style="color:#000000">信息用途：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $yongtu; ?></td>
</tr>
<tr> 
<th height="20" align="center" style="color:#000000">获取方式：</th>
<td style="color:#666666">
&nbsp;&nbsp;<?php 
if($info['huoqufangshi']=='0')
{echo 电子邮件;
}elseif($info['huoqufangshi']=='1')
{echo 电话告知;
}elseif($info['huoqufangshi']=='2')
{echo 信函邮寄;
}elseif($info['huoqufangshi']=='3')
{echo 传真;
}elseif($info['huoqufangshi']=='4')
{echo 自行领取;
}else
{echo 其他方式;
}?></td>
</tr>
<tr> 
<th height="20" align="center" style="color:#000000">回复内容：</th>
<td><textarea name="ysqgk[hgcontent]" style='width:94%;height:80px;' ><?php echo $hgcontent; ?></textarea></td>
</tr>
 <input type="hidden" name="ysqgk[hftime]" value="<?php echo time();?>" class="input-text">
	<tr>
		<th height="20" align="center"><?php echo L('elite')?>：</th>
		<td><input name="ysqgk[elite]" type="radio" value="1" <?php if($elite==1){echo "checked";}?>>&nbsp;<?php echo L('yes')?>&nbsp;&nbsp;<input
			name="ysqgk[elite]" type="radio" value="0" <?php if($elite==0){echo "checked";}?>>&nbsp;<?php echo L('no')?></td>
	</tr>
	 
	<tr>
		<th height="20" align="center"><?php echo L('passed')?>：</th>
		<td><input name="ysqgk[passed]" type="radio" value="1" <?php if($passed==1){echo "checked";}?>>&nbsp;<?php echo L('yes')?>&nbsp;&nbsp;<input
			name="ysqgk[passed]" type="radio" value="0" <?php if($passed==0){echo "checked";}?>>&nbsp;<?php echo L('no')?></td>
	</tr>
<tr> 
<th height="20" align="center" style="color:#000000">是否公开</th>
<td style="color:#666666">&nbsp;&nbsp;<?php if($ps=='0'){echo '公开';}else{ echo '保密';}?></td>
</tr>
<tr>
		<th height="20" align="center"></th>
		<td> <input
		type="submit" name="dosubmit" id="dosubmit" class="dialog"
		value=" <?php echo L('submit')?> "></td>
	</tr>
</table>
<?php }else{?>
<table cellpadding="0" cellspacing="1" class="table_form" width="100%">


	<tr>
		<th width="15%" height="20" align="center"><?php echo L('typeid')?>：</th>
		<td><select name="ysqgk[typeid]" id="">
		<option value="0" <?php if($typeid=='0'){echo "selected";}?>><?php echo $setting[$siteid]['sz6']; ?></option>
		<?php
		  $i=0;
		  foreach($types as $type_key=>$type){
		  $i++;
		?>
		<option value="<?php echo $type['typeid'];?>" <?php if($type['typeid']==$typeid){echo "selected";}?>><?php echo $type['name'];?></option>
		<?php }?>
			 
		</select> 
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 申请人IP：<?php echo $ip; ?> </td>
	</tr>
	
	<tr>
		<th height="20" align="center" style="color:#000000; font-weight:bold;">申请人类型：</th>
		<td style="color:#666666; font-weight:bold;">&nbsp;
<?php if($ysqgktype == 1){
 echo L('pl');
 ?>
<?php }else{
 echo L('gz');
 }	
 ?></td>
	</tr>
	
<tr> 
<th height="20" align="center" style="color:#000000; font-weight:bold;">受理编号：</th>
<td style="color:#666666; font-weight:bold;">&nbsp;&nbsp;<?php echo $bh; ?></td>
</tr>
<tr> 
<th height="20" align="center" style="color:#000000; font-weight:bold;">申请时间：</th>
<td style="color:#666666; font-weight:bold;">&nbsp;&nbsp;<?php echo  date("Y-m-d",$info['addtime'])?></td>
</tr>
<tr>
<th height="20" align="center" style="border-top:solid 3px #FFBE7A;color:#000000">机构名称：</th>
<td style="border-top:solid 3px #FFBE7A;color:#666666">&nbsp;&nbsp;<?php echo $gsmz; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">营业执照信息：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $zhizhao; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">法人代表：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $frdaibiao; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">组织机构代码：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $zzjg; ?></td>
</tr>
<tr>
<th height="20" align="center" style="border-top:solid 3px #FFBE7A;color:#000000">联 系 人：</th>
<td style="border-top:solid 3px #FFBE7A;color:#666666">&nbsp;&nbsp;<?php echo $lianxiren; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">联系地址：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $dizhib; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">邮政编码：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $youbianb; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">联系电话：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $telb; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">传　　真：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $faxb; ?></td>
</tr>
<tr>
<th height="20" align="center" style="color:#000000">电子邮箱：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $emailb; ?></td>
</tr>
<tr> 
<th height="20" align="center" style="border-top:solid 3px #FFBE7A;color:#000000">标<span style="color:#000000">　　</span>题：</th>
<td style="border-top:solid 3px #FFBE7A; font-weight:bold">&nbsp;&nbsp;<?php echo $title; ?></td>
</tr>
<tr> 
<th height="20" align="center" style="color:#000000">申请人所需内容描述：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $content; ?></td>
</tr>
<tr> 
<th height="20" align="center" style="color:#000000">信息用途：</th>
<td style="color:#666666">&nbsp;&nbsp;<?php echo $yongtu; ?></td>
</tr>
<tr> 
<th height="20" align="center" style="color:#000000">获取方式：</th>
<td style="color:#666666">
&nbsp;&nbsp;<?php 
if($info['huoqufangshi']=='0')
{echo 电子邮件;
}elseif($info['huoqufangshi']=='1')
{echo 电话告知;
}elseif($info['huoqufangshi']=='2')
{echo 信函邮寄;
}elseif($info['huoqufangshi']=='3')
{echo 传真;
}elseif($info['huoqufangshi']=='4')
{echo 自行领取;
}else
{echo 其他方式;
}?></td>
</tr>
<tr> 
<th height="20" align="center" style="color:#000000">回复内容：</th>
<td><textarea name="ysqgk[hgcontent]" style='width:94%;height:80px;' ><?php echo $hgcontent; ?></textarea></td>
</tr>
 <input type="hidden" name="ysqgk[hftime]" value="<?php echo time();?>" class="input-text">
	<tr>
		<th height="20" align="center"><?php echo L('elite')?>：</th>
		<td><input name="ysqgk[elite]" type="radio" value="1" <?php if($elite==1){echo "checked";}?>>&nbsp;<?php echo L('yes')?>&nbsp;&nbsp;<input
			name="ysqgk[elite]" type="radio" value="0" <?php if($elite==0){echo "checked";}?>>&nbsp;<?php echo L('no')?></td>
	</tr>
	 
	<tr>
		<th height="20" align="center"><?php echo L('passed')?>：</th>
		<td><input name="ysqgk[passed]" type="radio" value="1" <?php if($passed==1){echo "checked";}?>>&nbsp;<?php echo L('yes')?>&nbsp;&nbsp;<input
			name="ysqgk[passed]" type="radio" value="0" <?php if($passed==0){echo "checked";}?>>&nbsp;<?php echo L('no')?></td>
	</tr>
<tr> 
<th height="20" align="center" style="color:#000000">是否公开</th>
<td style="color:#666666">&nbsp;&nbsp;<?php if($ps=='0'){echo '公开';}else{ echo '保密';}?></td>
</tr>
<tr>
		<th height="20" align="center"></th>
		<td> <input
		type="submit" name="dosubmit" id="dosubmit" class="dialog"
		value=" <?php echo L('submit')?> "></td>
	</tr>
</table>
<?php echo  $info['frdaibiao']?><?php }?>
</form>
</div>
</body>
</html>

