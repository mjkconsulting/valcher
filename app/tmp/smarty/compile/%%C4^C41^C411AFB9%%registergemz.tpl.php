<?php /* Smarty version 2.6.26, created on 2010-02-08 23:58:41
         compiled from ../views/gemz/registergemz.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/registergemz.tpl', 9, false),array('modifier', 'escape', '../views/gemz/registergemz.tpl', 19, false),array('modifier', 'indent', '../views/gemz/registergemz.tpl', 19, false),)), $this); ?>

<a name="registergemz"></a>
<h2>Register Gemz service</h2>
	<li>Registers Gemz in a pouch</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/registerGemz/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/registerGemz/?user_id=1&pouch_id=2&gemz=3:1|2:8&delim=|&view=xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Gem ID</td><td>Int</td><td>The last Gem ID of the set registerd</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<response>
<register_gemz gem_id="5"/>
</response>')) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('indent', true, $_tmp, 10) : smarty_modifier_indent($_tmp, 10)); ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$pouch_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$gemz</td><td>String</td><td>Required&nbsp;[e.g: 1:3|3:1|2:6 ] pairs of gemIDs and priorities</td></tr>
		<tr><td>$delim</td><td>Int</td><td>Required&nbsp;[e.g: | ] for the args delimiter above</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>