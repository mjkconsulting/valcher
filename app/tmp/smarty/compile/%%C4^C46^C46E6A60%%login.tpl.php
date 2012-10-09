<?php /* Smarty version 2.6.26, created on 2010-11-05 22:12:30
         compiled from ../views/valcher/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/login.tpl', 9, false),array('modifier', 'escape', '../views/valcher/login.tpl', 15, false),array('modifier', 'indent', '../views/valcher/login.tpl', 15, false),)), $this); ?>

<a name="login"></a>
<h2>Login service</h2>
	<li>Checks User credentials in the system and authenticates</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/login/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/login/user@mobilegates.com/passwd1234/</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th><th>Response</th></tr>
		<tr><td>user_id</td><td>Int</td><td>The user ID&nbsp;</td><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<response><login>1</login></response>')) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('indent', true, $_tmp, 10) : smarty_modifier_indent($_tmp, 10)); ?>

	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$email</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$passwd</td><td>String</td><td>8 - 12 chars long - alpha-numeric&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>