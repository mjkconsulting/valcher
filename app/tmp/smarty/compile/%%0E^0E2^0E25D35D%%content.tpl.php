<?php /* Smarty version 2.6.26, created on 2010-11-05 20:06:01
         compiled from ../views/valcher/content.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/content.tpl', 9, false),array('modifier', 'escape', '../views/valcher/content.tpl', 19, false),array('modifier', 'indent', '../views/valcher/content.tpl', 19, false),)), $this); ?>

<a name="content"></a>
<h2>Content type service</h2>
	<li>Returns the available content types</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getGemzContentType/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getGemzContentType/xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Content type Set</td><td>Array</td><td>Available content types</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<response>
<types>
<type ct_content_id="1" ct_type="text" ct_status_id="1"/>
<type ct_content_id="2" ct_type="audio" ct_status_id="1"/>
<type ct_content_id="3" ct_type="video" ct_status_id="1"/>
<type ct_content_id="4" ct_type="image" ct_status_id="1"/>
<type ct_content_id="5" ct_type="binary" ct_status_id="1"/>
<type ct_content_id="6" ct_type="gzip" ct_status_id="1"/>
</types>
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