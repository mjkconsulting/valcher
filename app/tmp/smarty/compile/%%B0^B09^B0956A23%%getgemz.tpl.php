<?php /* Smarty version 2.6.26, created on 2010-02-10 12:54:26
         compiled from ../views/gemz/getgemz.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/getgemz.tpl', 9, false),array('modifier', 'escape', '../views/gemz/getgemz.tpl', 19, false),array('modifier', 'indent', '../views/gemz/getgemz.tpl', 19, false),)), $this); ?>

<a name="getgemz"></a>
<h2>Get Gemz service</h2>
	<li>Fetches gemz according to category/author</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getGemz/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getGemz/social/oren/xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Gem Objects</td><td>Array</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<response>
<gemz>
<gem gem_id="1" title="RadioTime Gem" description="Wrapper Gem for RadioTime" focus_icon="/gemz/images/radiotime_on.png" disable_icon="/gemz/images/radiotime_off.png" price="1" pri="3" created="2010-01-09 00:00:00" status_id="1" content="text" category="social" author="oren" purchase_url="" service_url="/gemz/radiotime/"/>
<gem gem_id="2" title="Traffic Gem" description="Shows traffic along a route" focus_icon="/gemz/images/traffic_on.png" disable_icon="/gemz/images/traffic_off.png" price="1.99" pri="4" created="2010-01-15 00:00:00" status_id="1" content="text" category="social" author="oren" purchase_url="/gemz/buy/traffic" service_url="/gemz/traffic/"/>
</gemz>
</response>')) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('indent', true, $_tmp, 10) : smarty_modifier_indent($_tmp, 10)); ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$category_id</td><td>String</td><td>Required (use &rsquo;all&rsquo; to get all categories)&nbsp;</td></tr>
		<tr><td>$author_id</td><td>String</td><td>Required (use &rsquo;all&rsquo; to get all authors)&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>