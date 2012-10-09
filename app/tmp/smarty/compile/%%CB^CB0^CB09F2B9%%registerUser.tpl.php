<?php /* Smarty version 2.6.26, created on 2010-11-21 12:46:48
         compiled from ../views/valcher/registerUser.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/registerUser.tpl', 8, false),array('modifier', 'escape', '../views/valcher/registerUser.tpl', 18, false),array('modifier', 'indent', '../views/valcher/registerUser.tpl', 18, false),)), $this); ?>

<a name="register"></a>
<h2>RegisterUser service</h2>
	<li>Registers a User</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/registerUser/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/registerUser/?user_id=1&fname=john&lname=smith&phone=818-988-0933...&view=xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>user ID</td><td>Int</td><td>The user ID registerd</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<response>
<register user_id="5"/>
</response>')) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('indent', true, $_tmp, 10) : smarty_modifier_indent($_tmp, 10)); ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$fname</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$lname</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$email</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$phone</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$address</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$address_type</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$city</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$state</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$country</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$cell</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$zipcode</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$passwd</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$user_type</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$device_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$lng</td><td>Float</td><td>Required&nbsp;</td></tr>
		<tr><td>$lat</td><td>Float</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>