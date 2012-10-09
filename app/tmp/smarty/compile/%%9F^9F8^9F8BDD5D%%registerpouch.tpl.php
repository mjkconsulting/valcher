<?php /* Smarty version 2.6.26, created on 2010-02-09 00:21:41
         compiled from ../views/gemz/registerpouch.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/registerpouch.tpl', 9, false),array('modifier', 'escape', '../views/gemz/registerpouch.tpl', 19, false),array('modifier', 'indent', '../views/gemz/registerpouch.tpl', 19, false),)), $this); ?>

<a name="registerpouch"></a>
<h2>Register Pouch service</h2>
	<li>Registers a pouch</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/registerPouch/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/registerPouch/?name=Tester&user_id=1&priority=2&status_id=2&parent_id=0&view=xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Gem ID</td><td>Int</td><td>The last Gem ID of the set registerd</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<response>
<register_pouch pouch_id="4"/>
</response>')) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('indent', true, $_tmp, 10) : smarty_modifier_indent($_tmp, 10)); ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$name</td><td>String</td><td>Required&nbsp;Pouch Name</td></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$priority</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$parent_id</td><td>Int</td><td>Required&nbsp;Pouch parent ID</td></tr>
		<tr><td>$status_id</td><td>Int</td><td>Required - the pouch status</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>