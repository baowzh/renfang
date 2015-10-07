<?php 
defined('IN_ADMIN') or exit('No permission resources.');
$show_header = 1;
include $this->admin_tpl('header', 'admin');
?>

<script type="text/javascript">
$(document).ready(function(){
var canshuStr=window.location.search;
var pos=canshuStr.indexOf("&did");
var posend=canshuStr.indexOf("&",pos+4);
var did_c=canshuStr.substring(pos+5,posend);
var answer_c="";
$("#tijiaohuida").click(function(){ 
answer_c= $("#answer").val(); 
$.post('index.php?m=formguide&c=formguide_info&a=public_answer', {
did: did_c,
answer: answer_c
}, function(json) {
if(json==1){
alert("回答成功");
}
}); 
}); 
});
</script>

<div class="pad-10">
<table width="100%" cellspacing="0" class="table-list">
	<thead>
		<tr>
			<th width="15%" align="right"><?php echo L('selects')?></th>
			<th align="left"><?php echo L('values')?></th>
		</tr>
	</thead>
<tbody>
 <?php
if(is_array($forminfos_data)){
	foreach($forminfos_data as $key => $form){
?>   
	<tr>
		<td><?php echo $fields[$key]['name']?>:</td>
		<td><?php echo $form?></td>
		
		
		</tr>
<?php 
	}
}
?>



<tr>
<td>回&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：</td>
<td>
<textarea id="answer" cols="80" rows="10">
<?php echo $answer; ?>
</textarea>
</td>
</tr>
<tr> 
<td>&nbsp;</td>
<td><input id="tijiaohuida" type="button" value="回复" /></td>
</tr>


	</tbody>
</table>

</div>
</body>
</html>