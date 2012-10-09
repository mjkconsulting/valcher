<?php /* Smarty version 2.6.26, created on 2010-02-07 23:28:34
         compiled from ../views/gemz/addresstype.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/addresstype.tpl', 9, false),array('modifier', 'escape', '../views/gemz/addresstype.tpl', 19, false),array('modifier', 'indent', '../views/gemz/addresstype.tpl', 19, false),)), $this); ?>

<a name="addresstype"></a>
<h2>Address Type service</h2>
	<li>Displays the available address types</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getGemzAddressType/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getGemzAddressType/xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Address Type Objects</td><td>Array</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<response>
<addresses>
<address at_address_type_id="1" at_address_type="residential"/>
<address at_address_type_id="2" at_address_type="commercial"/>
<address at_address_type_id="3" at_address_type="shipping"/>
<address at_address_type_id="4" at_address_type="billing"/>
<address at_address_type_id="5" at_address_type="work"/>
</addresses>
</response>')) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('indent', true, $_tmp, 10) : smarty_modifier_indent($_tmp, 10)); ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>