﻿<?php 
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<form method="post" action="?m=ysqgk&c=ysqgk&a=setting">
<table width="100%" cellpadding="0" cellspacing="1" class="table_form"> 
 
	<tr>
		<th width="20%"><?php echo L('sz1')?>：</th>
		<td><input type='radio' name='setting[sz1]' value='1' <?php if($sz1 == 1) {?>checked<?php }?>> <?php echo L('yes')?>&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[sz1]' value='0' <?php if($sz1 == 0) {?>checked<?php }?>> <?php echo L('no')?></td>
	</tr>
	<tr>
		<th><?php echo L('sz2')?>：</th>
		<td><input type='radio' name='setting[sz2]' value='1' <?php if($sz2 == 1) {?>checked<?php }?>> <?php echo L('yes')?>&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[sz2]' value='0' <?php if($sz2 == 0) {?>checked<?php }?>> <?php echo L('no')?></td>
	</tr>
	 
	<tr>
		<th><?php echo L('sz3')?>：</th>
		<td><input type='radio' name='setting[sz3]' value='1' <?php if($sz3 == 1) {?>checked<?php }?>> <?php echo L('yes')?>&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[sz3]' value='0' <?php if($sz3 == 0) {?>checked<?php }?>> <?php echo L('no')?></td>
	</tr>
	<tr>
		<th><?php echo L('sz4')?>：</th>
		<td>
		<input type="text" size="4" value="<?php echo $sz4; ?>" name='setting[sz4]' class="input-text"></td>
	</tr>	
	<tr>
		<th><?php echo L('sz5')?>：</th>
		<td>
		<input type="text" size="20" value="<?php echo $sz5; ?>" name='setting[sz5]' class="input-text"></td>
	</tr>	
	<tr>
		<th><?php echo L('sz6')?>：</th>
		<td>
		<input type="text" size="20" value="<?php echo $sz6; ?>" name='setting[sz6]' class="input-text"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="dosubmit" id="dosubmit" value=" <?php echo L('ok')?> " class="button">&nbsp;</td>
	</tr>
</table>
</form>
</body>
</html>
 