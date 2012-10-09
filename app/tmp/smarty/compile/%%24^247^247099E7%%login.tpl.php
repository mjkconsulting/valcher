<?php /* Smarty version 2.6.26, created on 2010-01-27 21:53:44
         compiled from /var/www/html/mobilegates/app/views/api/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '/var/www/html/mobilegates/app/views/api/login.tpl', 5, false),array('modifier', 'cat', '/var/www/html/mobilegates/app/views/api/login.tpl', 6, false),)), $this); ?>
<?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'css','path' => 'documents'), $this);?>

<?php $this->assign('server', ((is_array($_tmp="http://")) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['SERVER_NAME']) : smarty_modifier_cat($_tmp, $_SERVER['SERVER_NAME']))); ?>

<div id="content">
	<h2>Login service</h2>
	<li>Checks User credentials in the system and authenticates</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/api/login/",'url' => ((is_array($_tmp=$this->_tpl_vars['server'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/api/login/") : smarty_modifier_cat($_tmp, "/api/login/"))), $this);?>
</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>user_id</td><td>Int</td><td>The created user ID&nbsp;</td></tr>
	</table>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>username</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>fname</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>lname</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>email</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>phone</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>cell</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>address</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>address_type</td><td>String</td><td>[1=residential | 2=commercial | 3=shipping | 4=billing | 5=work]</td></tr>
		<tr><td>city</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>state</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>country</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>zipcode</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>password</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>user_type</td><td>Int</td><td>&nbsp;</td></tr>
		<tr><td>device_id</td><td>Int</td><td>&nbsp;</td></tr>
		<tr><td>longtitude</td><td>Float</td><td>&nbsp;</td></tr>
		<tr><td>latitude</td><td>Float</td><td>&nbsp;</td></tr>
		<tr><td>gemz</td><td>String</td><td>delimited pairs of gemz ids, priorities [23,2 | 400,1 | 945,4]</td></tr>
		<tr><td>delimiter</td><td>Char</td><td>used in previous arg&nbsp;(example: "|")</td></tr>
	</table>
</div>