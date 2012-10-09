<?php /* Smarty version 2.6.26, created on 2010-11-28 21:32:02
         compiled from ../views/valcher/trackDealShare.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/trackDealShare.tpl', 9, false),)), $this); ?>

<?php $this->assign('name', 'TrackDealShare'); ?>
<a name="<?php echo $this->_tpl_vars['name']; ?>
"></a>
<h2><?php echo $this->_tpl_vars['name']; ?>
 Service</h2>
	<li>Tracks a Deal Share</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/".($this->_tpl_vars['name'])."/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/<?php echo $this->_tpl_vars['name']; ?>
/?ref_url=http://www.google.com/adwords&user_id=2&key=51aBc123YzUnmE60aBc123YzUnmE59&credit=10</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>ID</td><td>Int</td><td>Last Insert ID</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
<?php echo '
{"response":[{"id":"3"}]}
'; ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$ref_url</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$credit</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$key</td><td>String</td><td>Required&nbsp;- Contains an encrypted token in the following format: user_id: deal_id</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>