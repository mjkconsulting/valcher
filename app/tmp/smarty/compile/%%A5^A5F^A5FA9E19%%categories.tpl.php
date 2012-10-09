<?php /* Smarty version 2.6.26, created on 2010-02-08 09:33:28
         compiled from ../views/gemz/categories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/categories.tpl', 9, false),array('modifier', 'escape', '../views/gemz/categories.tpl', 19, false),array('modifier', 'indent', '../views/gemz/categories.tpl', 19, false),)), $this); ?>

<a name="categories"></a>
<h2>Categories service</h2>
	<li>Fetches categories under the parent category ID (root categories = 0)</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getGemzCategories/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getGemzCategories/0/xml (gets all root categories)</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Category Objects</td><td>Array</td><td>Categories under the parent ID (default 0)</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<response>
<categories>
<category gc_category_id="1" gc_category_name="location" gc_category_parent="0" gc_status_id="1"/>
<category gc_category_id="2" gc_category_name="social" gc_category_parent="0" gc_status_id="1"/>
<category gc_category_id="3" gc_category_name="games" gc_category_parent="0" gc_status_id="1"/>
</categories>
</response>')) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('indent', true, $_tmp, 10) : smarty_modifier_indent($_tmp, 10)); ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$parent_id</td><td>Int</td><td>Optional&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>