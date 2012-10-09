<?php /* Smarty version 2.6.26, created on 2010-02-09 00:21:41
         compiled from ../views/gemz/pouches.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/pouches.tpl', 9, false),array('modifier', 'escape', '../views/gemz/pouches.tpl', 19, false),array('modifier', 'indent', '../views/gemz/pouches.tpl', 19, false),)), $this); ?>

<a name="pouches"></a>
<h2>User pouches service</h2>
	<li>Fetches user pouches</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getPouches/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getPouches/1/1/xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Pouch Set</td><td>Array</td><td>The user pouch sets</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<response>
<pouches>
<pouch p_pouch_id="1" p_name="Social pouch" p_status_id="1" p_created="2010-01-02 00:00:00" p_updated="2010-02-01 00:00:00" p_priority="1" p_parent_id="0"/>
<pouch p_pouch_id="2" p_name="Location" p_status_id="1" p_created="2010-01-02 00:00:00" p_updated="2010-01-02 00:00:00" p_priority="4" p_parent_id="0"/>
<pouch p_pouch_id="3" p_name="Family" p_status_id="1" p_created="2010-01-02 00:00:00" p_updated="2010-01-02 00:00:00" p_priority="2" p_parent_id="0"/>
</pouches>
</response>')) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('indent', true, $_tmp, 10) : smarty_modifier_indent($_tmp, 10)); ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$status</td><td>Int</td><td>[1=active | -1=all]&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>