<?php /* Smarty version 2.6.26, created on 2010-02-07 23:28:34
         compiled from ../views/gemz/radiotime.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/radiotime.tpl', 9, false),array('modifier', 'escape', '../views/gemz/radiotime.tpl', 19, false),array('modifier', 'indent', '../views/gemz/radiotime.tpl', 19, false),)), $this); ?>

<a name="radiotime"></a>
<h2>RadioTime service</h2>
	<li>Gateway to RadioTime API</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/radioTime/[method]/?[query_options]",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/radioTime/browse/?c=local&render=xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>RadioTime Object</td><td>Array</td><td>XML or JSON</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<opml version="1">
<head>
<title>RadioTime Music</title>
<status>200</status>
</head>
<body>
<outline type="link" text="Academy of Country Music Awards 2010 Nominees" URL="http://opml.radiotime.com/Browse.ashx?id=c885190&partnerId=Z9s2J4DX&serial=fe5p9qQpDoSf" guide_id="c885190"/>
<outline type="link" text="Adult Contemp" URL="http://opml.radiotime.com/Browse.ashx?id=c57935&partnerId=Z9s2J4DX&serial=fe5p9qQpDoSf" guide_id="c57935"/>
<outline type="link" text="Alt. Rock" URL="http://opml.radiotime.com/Browse.ashx?id=c57936&partnerId=Z9s2J4DX&serial=fe5p9qQpDoSf" guide_id="c57936"/>
</body></opml>')) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('indent', true, $_tmp, 10) : smarty_modifier_indent($_tmp, 10)); ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$method</td><td>String</td><td>Method to invoke in the RadioTime API</td></tr>
		<tr><td>$options</td><td>String</td><td>Query string consisting of key/value pairs (e.g c=local&render=json)</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>